<?php
session_start();

unset($_SESSION['banco']);
header("Location: ../cadastro/finalizarCadastro.php");
exit;
?>