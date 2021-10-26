<DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <header>
      <a href='?'>Index</a>
      <a href='?controller=example&action=home'>Example</a>
      <a href='?controller=posts&action=index'>Posts</a>
      <a href='?controller=pages&action=otherPage'>OtherPage</a>
      <?php 
      session_start();
      if(isset($_SESSION['user'])){
        echo'<a href="?controller=user&action=logout">Logout</a> Logged in as '.$_SESSION['user'];
      }else{
        echo '<a href="?controller=pages&action=login">Login</a>';
      }
      ?>
      
    </header>

    <?php require_once('routes.php'); ?>

    <footer>
      Copyright
    </footer>
  <body>
<html>