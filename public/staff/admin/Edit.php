<?php
require_once('../../../private/initialize.php');
if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/admin/index.php'));
}
$id = $_GET['id'];
$error = $_GET['error'] ?? '';
if(is_post_request()) {
  // Handle form values sent by new.php
  $news = [];
  $news['id'] = $id;
  $news['titulo'] = $_POST['titulo'] ?? '';
  $news['imagen'] = $_FILES['uploadedfile']['name'] ?? '';
  $news['descripcion'] = $_POST['descripcion'] ?? '';
  $news['fecha'] = $_POST['fecha'] ?? '';
  if (empty($news['imagen'])) {
    $news['imagen'] = $_POST['last-upload'];
  }else {
    $image_data = $_FILES['uploadedfile']['tmp_name'] ?? '';
    $upload_image = 'C:/xampp/htdocs' . WWW_ROOT . '/images/imgnews/'. $news['imagen'];
    move_uploaded_file($image_data, $upload_image);
  }
  $error = validate_news($news);
  if (strlen($error) > 0) {
    redirect_to(url_for('/staff/admin/edit.php?error=' . $error . "&id=" . $id));
  }
  $result = update_news($news);
  echo $result;
  redirect_to(url_for('/staff/admin/show.php?id=' . $id));
} else {
  $news = find_news_by_id($id);
  $news_set = find_all_news();
  $news_count = mysqli_num_rows($news_set);
}
?>
<?php $page_title = 'Editar noticia'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/admin/index.php'); ?>">&laquo; volver a la lista de noticias</a>
  <div class="editar noticia">
    <h1>editar noticia</h1>
      <form class="form_create" action="<?php echo url_for('/staff/admin/edit.php?id=' . h(u($id))); ?>" method="post" enctype="multipart/form-data">
          <h2>titulo</h2>
          <input class="tittle" type="text" required name="titulo" value="<?php echo h($news['titulo']); ?>" >
          <?php
            if (strlen($error) > 0) {
              echo '<div class="errors"><p>' . $error . '</p></div>';
            }
           ?>
          <h2>sube una imagen de noticia</h2>
          <input   name="uploadedfile" type="file" />
          <input name="last-upload" type="hidden" value="<?php echo h($news['imagen']); ?>"/>
          <textarea required name="descripcion" rows="10" cols="130"><?php echo h($news['descripcion']); ?></textarea>
          <input type="date"  name="fecha" value="<?php echo h($news['fecha']); ?>" >
          <input type="submit"  value="editar noticia" />
      </form>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
