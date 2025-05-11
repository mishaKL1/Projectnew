<?php
session_start();
header("Location: ../reviews.php");
session_destroy();
?>