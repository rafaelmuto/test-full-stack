<?php

switch ($_REQUEST['action']) {

  case 'cadastro':
    unset($_GET['action']);
    switch ($_POST['class']) {

      case 'usuarios':
        unset($_POST['class']);
        include "classes/usuario.class.php";
        $return = (new usuario)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=usuarios');
        break;

      case 'produtos':
        unset($_POST['class']);
        include "classes/produto.class.php";
        $return = (new produto)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=produtos');
        break;

      case 'publicacoes':
        unset($_POST['class']);
        include "classes/publicacao.class.php";
        $return = (new publicacao)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=publicacoes');
        break;

      case 'cat_produto':
        unset($_POST['class']);
        include "classes/categorias.class.php";
        $return = (new catProduto)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=cat_produto');
        break;

      case 'cat_publicacao':
        unset($_POST['class']);
        include "classes/categorias.class.php";
        $return = (new catPublicacao)->add($_POST);
        if(!$return['error']) header('Location:Read.php?show=cat_publicacao');
        break;
    }
    header("Location:index.php?error=TRUE&msg=".$return['msg']);  
    break;

  case 'delete':
    include "classes/db.class.php";
    unset($_GET['action']);
    $query = 'DELETE FROM '.$_GET['class'].' WHERE '.$_GET['column'].'='.$_GET['id'];
    (new db)->runQuery($query);
    header('Location:Delete.php?show='.$_GET['class']);
    break;

  default:
    header("Location:index.php?msg=switch_error");
    break;
}

 ?>
