<?php 
session_start();
session_destroy();	
header('Location: Index.php?status=405'); 
?>