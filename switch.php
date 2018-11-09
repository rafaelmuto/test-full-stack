<?php

switch ($_GET['action']) {

  case 'cadastro':
    unset($_GET['action']);
    switch ($_GET['tabela']) {

      case 'usuarios':
        include "classes/usuario.class.php";
        $return = (new usuario)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=usuarios');
        break;

      case 'produtos':
        include "classes/produto.class.php";
        $return = (new produto)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=produtos');
        break;

      case 'publicacoes':
        include "classes/publicacao.class.php";
        $return = (new publicacao)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=publicacoes');
        break;

      case 'cat_produto':
        include "classes/categorias.class.php";
        $return = (new catProduto)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=cat_produto');
        break;

      case 'cat_publicacao':
        include "classes/categorias.class.php";
        $return = (new catPublicacao)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=cat_publicacao');
        break;
    }
    header("Location:index.php?error=TRUE&msg=".$return['msg']);
    break;

  case 'update':
    switch ($_GET['class']) {
      case 'usuarios':
        var_dump($_POST);
        break;

      case 'produtos':
        // code...
        break;

      case 'publicacoes':
        // code...
        break;

      case 'cat_produto':
        // code...
        break;

      case 'cat_publicacao':
        // code...
        break;

      default:
        header("Location:index.php?msg=switch_error");
        break;
    }

    break;

  case 'delete':
    include "classes/db.class.php";
    unset($_GET['action']);
    $query = 'DELETE FROM '.$_GET['tabela'].' WHERE '.$_GET['column'].'='.$_GET['id'];
    (new db)->runQuery($query);
    header('Location:Delete.php?show='.$_GET['tabela']);
    break;

  default:
    header("Location:index.php?msg=switch_error");
    break;
}

 ?>
