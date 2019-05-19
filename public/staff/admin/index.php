<?php require_once('../../../private/initialize.php');
session_start();
if (!session_validate()) {
  redirect_to(url_for('/staff/login.php'));
}
?>
<?php $news_set = find_all_news(); ?>
<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
  <div class="subjects listing">
  <h1>Editar Noticias</h1>
    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/admin/nuevo.php'); ?>">crear nueva noticia</a>
    </div>
    <div class="edit-noticias">
    <?php while($news = mysqli_fetch_assoc($news_set)) { ?>
      <div class="edit-content">
        <div class="edit-titulo">
          <p><b> <?php
          if (strlen($news['titulo'])>15) {
            echo h(substr($news['titulo'], 0, 15)." ...");
          }else{
          echo h($news['titulo']); } ?></b></p>
        </div>
        <div class="edit-imagen">
          <img src="../../images/imgnews/<?php echo h($news['imagen']); ?>" alt="">
        </div>
        <div class="edit-fecha">
          <p><?php echo h($news['fecha']); ?></p>
        </div>
        <div class="edit-descripcion">
          <p><?php
          if (strlen($news['descripcion'])>150) {
            echo h(substr($news['descripcion'], 0, 150)." ...");
          }else{
          echo h($news['descripcion']); } ?></p>
        </div>
        <div class="edit-actions">
        <a class="action" href="<?php echo url_for('/staff/admin/show.php?id=' . h(u($news['id']))); ?>">View</a>
        <a class="action" href="<?php echo url_for('/staff/admin/edit.php?id=' . h(u($news['id']))); ?>">Edit</a>
        <a class="action" href="<?php echo url_for('/staff/admin/delete.php?id=' . h(u($news['id']))); ?>">Delete</a>
        </div>
      </div>
      <?php } ?>
    </div>
    <a class="action" href="<?php echo url_for('/staff/admin/closesession.php'); ?>">cerrar sesion</a>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
