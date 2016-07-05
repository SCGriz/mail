<?php
  session_start();
  $auth_code = $_GET['code'];
?>

<p>Auth code: <?php echo $auth_code ?></p>
