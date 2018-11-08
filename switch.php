<?php

switch ($_REQUEST['action']) {
  case 'cad_usuario':
    include "classes/usuario.class.php";
    unset($_POST['action']);
    $return = (new usuario)->add($_POST);
    var_dump($return);
    break;

  case 'cad_produto':
    include "classes/produto.class.php";
    unset($_POST['action']);
    $return = (new produto)->add($_POST);
    var_dump($return);
    break;

  case 'cad_publicacao':
    include "classes/publicacao.class.php";
    unset($_POST['action']);
    $return = (new publicacao)->add($_POST);
    var_dump($return);
    break;

  case 'cad_publicacao':
    // code...
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
