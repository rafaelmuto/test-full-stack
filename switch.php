<?php

switch ($_REQUEST['action']) {
  case 'cadastro':
    include "classes/usuario.class.php";
    unset($_POST['action']);
    $return = (new usuario)->add($_POST);
    // code...
    break;

  default:
      header("Location:main.php?msg=switch_error");
    break;
}

 ?>
