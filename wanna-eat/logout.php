<?php
session_start();
session_destroy();
unset($_SESSION['logged_in']);
header('Location: index.php');