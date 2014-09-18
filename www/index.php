<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name = "dcterms.language" content="en" />
<?php

/* TITLE */  
  $title_txt = "DirichletReg &ndash; Dirichlet Regression in R";

/* DESCRIPTION */  
  $desc_txt = "This project implements Dirichlet regression models for the analysis of Compositional Data, Rates, Proportions, etc. in R.";

  echo "    <title>$title_txt</title>\n";
  echo "    <meta name = \"dcterms.title\"     content=\"$title_txt\" />\n";
  echo "    <meta property = \"og:title\"      content=\"$title_txt\" />\n";
  echo "    <meta property = \"twitter:title\" content=\"$title_txt\" />\n";

  echo "    <meta name = \"description\"             content=\"$desc_txt\" />\n";
  echo "    <meta name = \"dcterms.description\"     content=\"$desc_txt\" />\n";
  echo "    <meta property = \"og:description\"      content=\"$desc_txt\" />\n";
  echo "    <meta property = \"twitter:description\" content=\"$desc_txt\" />\n";

/* KEYWORDS */
  $keywords_txt = "DirichletReg,Dirichlet Regression,R,Compositional Data,Compositions,Rates,Proportions,Percentages,Quotas,Shares";
  echo "    <meta name = \"keywords\"        content = \"$keywords_txt\" />";
  echo "    <meta name = \"dcterms.subject\" content=\"$keywords_txt\" />\n";

?>
    <meta name="robots" content="Index,Follow" />
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body><div id="universe">

  <div class="title">
    <code>DirichletReg</code> &ndash; Dirichlet Regression in <code>R</code>
  </div>

  <ul class="mainList">
    <li>
      <strong class="listheader">Installation</strong>
      <br />
      Copy &amp; paste this code into <code>R</code>:
      <br />
      <code>install.packages("DirichletReg", repos="http://r-forge.r-project.org")</code>
    </li>
    <li>
      <strong class="listheader">Project Summary Page</strong>
      <br />
      <a href="http://r-forge.r-project.org/projects/dirichletreg/">http://r-forge.r-project.org/projects/dirichletreg/</a>
      <br />
      <strong class="listheader">CRAN Releases</strong>
      <br />
      <a href="http://cran.r-project.org/package=DirichletReg">http://cran.r-project.org/package=DirichletReg</a>
    </li>
    <li>
      <strong class="listheader">Publications &amp; Citations</strong>
      <br />
      <a href="DirichletReg.bib">BibTeX-File with all citations.</a>
      <br />
      You can get all (BibTeX) citations for the current version using
      <br />
      <code>citation("DirichletReg")</code>
      <br />
      and
      <br />
      <code>toBibtex(citation("DirichletReg"))</code>
      <ol class="bibList">
        <li>
          Maier, M. J. (2014). <i>DirichletReg: Dirichlet Regression for Compositional Data in R.</i>
          Research Report Series&nbsp;/ Department of Statistics and Mathematics, 125.
          WU Vienna University of Economics and Business, Vienna.
          <a href="http://epub.wu.ac.at/4077/" target="_blank">http://epub.wu.ac.at/4077/</a>
        </li>
      </ol>
    </li>
  </ul>

  </div></body>
</html>