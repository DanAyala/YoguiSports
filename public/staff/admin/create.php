<?php
require_once('../../../private/initialize.php');
if(is_post_request()) {
  // Handle form values sent by new.php
  $news = [];
  $news['titulo'] = $_POST['titulo'] ?? '';
  $news['imagen'] = $_FILES['uploadedfile']['name'] ?? '';
  $news['descripcion'] = $_POST['descripcion'] ?? '';
  $news['fecha'] = $_POST['fecha'] ?? '';
  $image_data = $_FILES['uploadedfile']['tmp_name'] ?? '';
  $upload_image = 'C:/xampp/htdocs' . WWW_ROOT . '/images/imgnews/'. $news['imagen'];
  move_uploaded_file($image_data, $upload_image);
  $error = validate_news($news);
  if (strlen($error) > 0) {
    redirect_to(url_for('/staff/admin/nuevo.php?error=' . $error));
  }
  $result = insert_news($news);
  $new_id = mysqli_insert_id($db);
  echo $result;
  redirect_to(url_for('/staff/admin/show.php?id=' . $new_id));
} else {
  redirect_to(url_for('/staff/admin/nuevo.php'));
}
?>
