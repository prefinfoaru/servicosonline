<?php

if (!isset($_SESSION['usuario']) ||  !isset($_SESSION['ativo'])) {
  header('Location: login.php');
}
