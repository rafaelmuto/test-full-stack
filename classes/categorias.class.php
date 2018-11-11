<?php
include_once "db.class.php";

/**
 *  Classe catProduto para cuidar das categorias de produtos
 */
class catProduto extends db
{
  protected $pdo;

  public function listar(){
    return $this->pdo->query('SELECT * FROM cat_produto')->fetchall(PDO::FETCH_ASSOC);
  }

  public function add($post){
    if(in_array($post['cat_nome'],$this->pdo->query('SELECT cat_nome FROM cat_produto')->fetchall(PDO::FETCH_COLUMN))){
      return ["error"=>TRUE, "msg"=>'categoria_ja_cadastrado'];
    }
    $query = $this->pdo->prepare('INSERT INTO cat_produto(`cat_nome`) VALUES(:cat_nome)');
    $query->execute($post);
    return ["error"=>FALSE, "msg"=>'categoria_cadastrada'];
  }

  public function update($post){
    $lista = $this->pdo->query('SELECT cat_nome FROM cat_produto')->fetchall(PDO::FETCH_COLUMN);
    if(in_array($post['cat_nome'],$lista[0])) return ["error"=>TRUE, "msg"=>'cat_nome_ja_cadastrada'];
    $query = $this->pdo->prepare('UPDATE cat_produto SET cat_nome=:cat_nome WHERE cat_produto_id=:cat_produto_id')->execute($post);
    return ["error"=>FALSE, "msg"=>"update_ok"];
  }
}

/**
 *  Classe catPublicacao para cuidar das categorias de publicacao
 */
class catPublicacao extends db
{
  protected $pdo;

  public function listar(){
    return $this->pdo->query('SELECT * FROM cat_publicacao')->fetchall(PDO::FETCH_ASSOC);
  }

  public function add($post){
    if(in_array($post['cat_nome'],$this->pdo->query('SELECT cat_nome FROM cat_publicacao')->fetchall(PDO::FETCH_COLUMN))){
      return ["error"=>TRUE, "msg"=>'categoria_ja_cadastrado'];
    }
    $query = $this->pdo->prepare('INSERT INTO cat_publicacao(`cat_nome`) VALUES(:cat_nome)');
    $query->execute($post);
    return ["error"=>FALSE, "msg"=>'categoria_cadastrada'];
  }

  public function update($post){
    $lista = $this->pdo->query('SELECT cat_nome FROM cat_publicacao')->fetchall(PDO::FETCH_COLUMN);
    if(in_array($post['cat_nome'],$lista[0])) return ["error"=>TRUE, "msg"=>'cat_nome_ja_cadastrada'];
    $query = $this->pdo->prepare('UPDATE cat_publicacao SET cat_nome=:cat_nome WHERE cat_publicacao_id=:cat_publicacao_id')->execute($post);
    return ["error"=>FALSE, "msg"=>"update_ok"];
  }
}



 ?>
