<?php
require_once("join_header.php");
if (!isset($_POST['submit']))
  require_once("join_form.php");
else
  require_once("signup.php");
require_once("footer.php");
?>