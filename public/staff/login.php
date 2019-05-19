<?php require_once('../../private/initialize.php');
session_start();

if (session_validate()) {
  redirect_to(url_for('/staff/admin/index.php'));
}
if (is_post_request()) {
  $result = find_user($_POST['user'], $_POST['pass']);
  if (mysqli_num_rows($result)>0) {
    $_SESSION['admin']= $_POST['user'];
    redirect_to(url_for('/staff/admin/index.php'));
  }
}
?>
<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
  <div id="main-menu" class="main-menu">
    <h2>inicia sesión para administrar las noticias</h2>
    <form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <input type="text" required name="user" value="" placeholder="user name"><br><br>
      <input type="password" required name="pass" value="" placeholder="password"><br><br>
      <input type="submit" name="" value="Login" >
    </form>
  </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
