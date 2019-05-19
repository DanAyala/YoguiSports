<?php require_once('../../private/initialize.php'); ?>

<?php $news_set = find_all_news(); ?>

<?php $page_title = 'YS'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="principales">
<?php while($news = mysqli_fetch_assoc($news_set)) { ?>
  <div class="principal1">
    <div class="titulo">
      <h1><?php echo h($news['titulo']); ?></h1>
    </div>

    <div class="imagen">

      <img src="../images/imgnews/<?php echo h($news['imagen']); ?>" alt="">
      


    </div>
    <div class="fecha">
      <p><?php echo h($news['fecha']); ?></p>
    </div>

    <p><?php echo h($news['descripcion']); ?></p>
  </div>
<?php } ?>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
