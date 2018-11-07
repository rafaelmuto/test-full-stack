<?php

switch ($_REQUEST['action']) {
  case 'cadastro':
    include "classes/usuario.class.php";
    unset($_POST['action']);
    $return = (new usuario)->add($_POST);
    var_dump($return);
    break;

  case 'cad_catProduto':
    include "classes/categorias.class.php";
    unset($_POST['action']);
    $return = (new catProduto)->add($_POST);
    var_dump($return);
    break;

  case 'cad_catPublicacao':
    include "classes/categorias.class.php";
    unset($_POST['action']);
    $return = (new catPublicacao)->add($_POST);
    var_dump($return);
    break;

  default:
      header("Location:main.php?msg=switch_error");
    break;
}

 ?>
