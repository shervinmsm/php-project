<?php


session_start();
session_unset();
session_destroy();

header("Location:/admin-panel/pages/auth/login.php");
