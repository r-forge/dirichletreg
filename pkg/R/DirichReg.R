DirichReg <- function(formula,
                      data,
                      weights,
                      control,
                      verbosity=0,
                      ...){

  this.call <- match.call()

  
  if(missing(formula)) stop("specification of \"formula\" is necessary.")
  if(missing(data)) data <- NULL
  if(missing(weights)) weights <- 1
  if(missing(control)){
    control <- list(iterlim=1000, trace=0, method="BHHH", anGrad=TRUE)
  } else {
    if(is.null(control$iterlim)) control$iterlim  <-   1000
    if(is.null(control$trace))   control$trace    <-      0
    if(is.null(control$method))  control$method   <- "BHHH"
    if(is.null(control$anGrad))  control$anGrad   <-   TRUE
  }

if(verbosity > 0) cat("\n- PREPARING DATA\n"); flush.console()

  preparation <- prep_formula(formula, data)
  response <- preparation$response
  Y        <- preparation$Y
  n.dim    <- preparation$n.dim
  n.vars   <- preparation$n.vars
  X.mats   <- preparation$X.mats
  Z.mat    <- preparation$Z.mat
  repar    <- preparation$repar
  d        <- preparation$d
  base     <- preparation$base
  
if(verbosity > 0) cat("\n- COMPUTING STARTING VALUES\n"); flush.console()

  
  if(is.null(control$sv)){
    starting.vals <- get_starting_values(Y=Y, X.mats=lapply(X.mats, as.matrix), Z.mat=as.matrix(Z.mat), repar=repar, base=base) * if(repar){ 1 } else { 1/n.dim }
  } else {
    starting.vals <- control$sv
  }


  
  

  parameterization <- ifelse(repar, "alternative", "common")

if(verbosity > 0) cat("\n- ESTIMATING PARAMETERS\n"); flush.console()

  
  fit.res <- DirichReg.fit(Y     = Y,
                           X     = lapply(X.mats, as.matrix),
                           Z     = as.matrix(Z.mat),
                           sv    = starting.vals,
                           d     = n.dim,
                           k     = n.vars,
                           w     = weights,
                           ctls  = control,
                           repar = repar,
                           base  = base)
  
  varnames <- colnames(Y)
  
  coefs <- fit.res$estimate

  if(repar){
    names(coefs) <- unlist(as.vector(c(rep(colnames(X.mats[[1]]),n.dim-1),colnames(Z.mat))))
  } else {
    names(coefs) <- unlist(as.vector(sapply(X.mats, colnames)))
  }


  
  if(repar){

    B <- matrix(0, nrow=n.vars[1], ncol=n.dim)
    B[cbind(rep(1:n.vars[1], (n.dim-1)), rep((1:n.dim)[-base], each=n.vars[1]))] <- coefs[1:((n.dim-1)*n.vars[1])]
    
    g <- matrix(coefs[((n.dim-1)*n.vars[1]+1):length(coefs)], ncol=1)
  
    XB <- exp(apply(B, 2, function(b){ X.mats[[1]]%*%b }))
    MU <- apply(XB, 2, function(x){ x /rowSums(XB) })
  
    PHI <- exp(Z.mat%*%g)
    
    ALPHA <- apply(MU, 2, "*", PHI)
  
  } else {

    B <- list(coefs[1:n.vars[1]])
    for(i in 2:n.dim)B[[i]] <- coefs[(cumsum(n.vars)[i-1]+1):cumsum(n.vars)[i]]
    
    ALPHA <- sapply(1:length(X.mats), function(i){ exp(X.mats[[i]]%*%B[[i]]) })

    PHI <- rowSums(ALPHA)
    MU  <- apply(ALPHA, 2, "/", PHI)

  }
  
  colnames(ALPHA) <- varnames
  colnames(MU) <- varnames


  
  res <- list(call=this.call,
              parameterization=parameterization,
              varnames=varnames,
              n.vars=n.vars,
              Y=Y,
              X=X.mats,
              Z=Z.mat,
              orig.resp=response,
              data=data,
              d=d,
              formula=formula,
              npar=length(coefs),
              coefficients=coefs,
              fitted.values=list(mu=MU,phi=PHI,alpha=ALPHA),
              residuals=NA,
              logLik=fit.res$maximum,
              hessian=fit.res$hessian,
              weights=weights,
              se=sqrt(diag(solve(-fit.res$hessian))),
              optimization=list(convergence=fit.res$code,
                                counts=fit.res$iterations,
                                message=fit.res$message))
              
  class(res) <- "DirichletRegModel"
              
  return(res)


}