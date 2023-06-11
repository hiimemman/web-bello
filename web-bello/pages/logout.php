<?php
session_start();
session_destroy();
header('Location: /web-bello/pages/index.php');
exit();
?>