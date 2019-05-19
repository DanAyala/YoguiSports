<?php require_once('../../../private/initialize.php');
session_start();
 $news_set = find_all_news();
 $news_count = mysqli_num_rows($news_set) +1;
 mysqli_free_result($news_set);
 $news=[];
 $news['id'] = $news_count;
 $error = $_GET['error'] ?? '';
if (!session_validate()) {
  redirect_to(url_for('/staff/login.php'));
}
?>
<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div class="nueva-noticia">
  <form class="form_create" action="<?php echo url_for('/staff/admin/create.php'); ?>" method="post" enctype="multipart/form-data">
    <h2>crear una entrada nueva</h2>
    <input class="tittle" type="text" required name="titulo" value="" placeholder="ingresa titulo">
    <?php
      if (strlen($error) > 0) {
        echo '<div class="errors"><p>' . $error . '</p></div>';
      }
     ?>
    <h2>sube una imagen de noticia</h2>
    <input required name="uploadedfile" type="file"/>
    <textarea required name="descripcion" rows="10" cols="130" placeholder="escribe descripción de la nueva noticia"></textarea>
    <input type="date" required name="fecha" >
    <input type="submit" class="tittle" value="crear noticia" />
  </form>
</div>
<div class="logout">
<a class="action" href="<?php echo url_for('/staff/admin/closesession.php'); ?>">cerrar sesión</a>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
