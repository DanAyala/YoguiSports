<?php
  require_once('../../../private/initialize.php');
  if (!isset($_GET['id'])) {
    redirect_to(url_for('staff/admin/index.php'));
  }
  $id = $_GET['id'];
  $news = find_news_by_id($id);
  if (is_post_request()) {
    $result = delete_news($id);
    redirect_to(url_for('/staff/admin/index.php'));
  } else {
    $news = find_news_by_id($id);
  }
 ?>
 <?php $page_title = 'Borrar noticia'; ?>
 <?php include(SHARED_PATH . '/staff_header.php'); ?>
 <div id="content">
   <a class="back-link" href="<?php echo url_for('/staff/admin/index.php'); ?>">&laquo; volver a la lista de noticias</a>
   <div class="subject delete">
     <h1>borrar noticia</h1>
     <p>¿deseas eliminar la siguiente noticia?</p>
     <h2><?php echo $news['titulo']; ?></h2>
     <form class="" action="<?php echo url_for('/staff/admin/delete.php?id=' . h(u($id))); ?>" method="post">
       <div id="operations">
         <input type="submit" value="si, borrar noticia" />
       </div>
     </form>
   </div>
 </div>
  <?php include(SHARED_PATH . '/staff_footer.php'); ?>
