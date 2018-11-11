<?php

switch ($_GET['action']) {

  case 'cadastro':
    unset($_GET['action']);
    switch ($_GET['tabela']) {

      case 'usuarios':
        include "classes/usuario.class.php";
        $return = (new usuario)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=usuarios');
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
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
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
        break;

      case 'cat_produto':
        include "classes/categorias.class.php";
        $return = (new catProduto)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=cat_produto');
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
        break;

      case 'cat_publicacao':
        include "classes/categorias.class.php";
        $return = (new catPublicacao)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=cat_publicacao');
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
        break;
    }
    break;

  case 'update':
    switch ($_GET['class']) {
      case 'usuarios':
        include "classes/usuario.class.php";
        $return = (new usuario)->update($_POST);
        if(!$return['error']) header("Location:Update.php?show=usuarios");
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
        break;

      case 'produtos':
        include "classes/produto.class.php";
        $return = (new produto)->update($_POST);
        if(!$return['error']) header("Location:Update.php?show=produtos");
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
        break;

      case 'publicacoes':
        include "classes/publicacao.class.php";
        $return = (new publicacao)->update($_POST);
        if(!$return['error']) header("Location:Update.php?show=publicacoes");
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
        break;

      case 'cat_produto':
        include "classes/categorias.class.php";
        $return = (new catProduto)->update($_POST);
        if(!$return['error']) header("Location:Update.php?show=cat_produto");
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
        break;

      case 'cat_publicacao':
        include "classes/categorias.class.php";
        $return = (new catPublicacao)->update($_POST);
        if(!$return['error']) header("Location:Update.php?show=cat_publicacao");
        else header("Location:index.php?error=TRUE&msg=".$return['msg']);
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
