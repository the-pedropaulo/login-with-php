<?php

session_start();
ob_start();
unset($_SESSION['name'], $_SESSION['id']);
$_SESSION['msg'] = "<p style='color: green'>Deslogado com sucesso</p>";
header('Location: index.php');