<?php
include_once "db.class.php";
/**
 *
 */
class usuario extends Db
{
  public $pdo;

  public function listar(){
    return $this->pdo->query('SELECT * FROM usuarios')->fetchall(PDO::FETCH_ASSOC);
  }

  public function add($post){
    if($post['senha'] != $post['conf_senha']){
      return ["error"=>TRUE, "msg"=>'senhas_nao_conferem'];
    }
    if(in_array($post['nome'],$this->pdo->query('SELECT nome FROM usuarios')->fetchAll(PDO::FETCH_COLUMN))){
      return ["error"=>TRUE, "msg"=>'nome_ja_cadastrado'];
    }
    else{
      unset($post['conf_senha']);
      $post['senha'] = password_hash($post['senha'], PASSWORD_DEFAULT);
    }

    $query = $this->pdo->prepare('INSERT INTO usuarios(`nome`,`email`,`senha`) VALUES(:nome, :email, :senha)');
    $query->execute($post);
    return ["error"=>FALSE, "msg"=>'usuario_cadastrado'];
  }
}

?>
