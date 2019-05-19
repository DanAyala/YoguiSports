<?php require_once('../../../private/initialize.php');
session_start();
if (!session_validate()) {
  redirect_to(url_for('/staff/login.php'));
}
?>
<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0
$news = find_news_by_id($id);
?>
<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div class="show title">
  <a class="back-link" href="<?php echo url_for('/staff/admin/index.php'); ?>">&laquo; volver a noticias</a>
  <h2>este es el show/view</h2><br>
  <div class="news show">
    <h1>noticia: <?php echo h($news['titulo']); ?></h1>
    <dl>
      <dt>imagen</dt>
      <dd> <?php echo h($news['imagen']); ?> </dd>
    </dl>
    <div class="attributes">
      <dl>
        <dt>Descripcion de noticia</dt>
        <dd> <?php echo h($news['descripcion']); ?> </dd>
      </dl>
      <dl>
        <dt>fecha</dt>
        <dd> <?php echo h($news['fecha']); ?> </dd>
      </dl>
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
