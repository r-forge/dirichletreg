<?php

  /* This is the project specific website template */
  /* It can be changed as liked or replaced by other content */
  
  $domain     = ereg_replace('[^\.]*\.(.*)$','\1',$_SERVER['HTTP_HOST']);
  $group_name = ereg_replace('([^\.]*)\..*$','\1',$_SERVER['HTTP_HOST']);
  $themeroot  = 'http://r-forge.r-project.org/themes/rforge/';
  
  echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $group_name; ?></title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!-- R-Forge Logo -->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <h1 class="title"><code>DirichletReg</code> &mdash; Dirichlet Regression in <code>R</code></h1>
    </td>
    <td>
      <a href="http://r-forge.r-project.org/">
        <img src="https://r-forge.r-project.org/themes/rforge/imagesrf/logo.png" border="0" alt="R-Forge Logo" />
      </a>
    </td>
  </tr>
</table>

<ul class="mainList">
  <li>
    <strong class="listheader">Installation</strong>
    <br />
    copy &amp; paste this code into R:
    <br />
    <code>install.packages("DirichletReg", repos="http://r-forge.r-project.org")</code>
  </li>
  <li>
    <strong class="listheader">Project Summary Page</strong>
    <br />
    <a href="http://<?php echo $domain; ?>/projects/<?php echo $group_name; ?>/">
      http://<?php echo $domain; ?>/projects/<?php echo $group_name; ?>/
    </a>
  </li>
</ul>

</body>
</html>

<?php /* if($handle=fopen('http://'.$domain.'/export/projtitl.php?group_name='.$group_name,'r')){
  $contents = '';
  while (!feof($handle)) {
	  $contents .= fread($handle, 8192);
  }
  fclose($handle);
  echo $contents;
} */ ?>
