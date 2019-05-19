<?php
  if(!isset($page_title)) { $page_title = 'YoguiSports'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title> <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1><i>YoguiSports</i></h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/staff/index.php'); ?>">Inicio</a></li>
        <li><a href="<?php echo url_for('/staff/noticias/index.php'); ?>">Noticias</a></li>
        <li><a href="<?php echo url_for('/staff/about/index.php'); ?>">Nosotros</a></li>
        <li><a href="<?php echo url_for('/staff/login.php'); ?>">Admin</a></li>
      </ul>
    </navigation>
