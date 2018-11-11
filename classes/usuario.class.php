<?php
include_once "db.class.php";
/**
 *  Classe ususario cuida dos usuarios
 */
class usuario extends Db
{
  protected $pdo;

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

  public function update($post){
    $lista = $this->listar();
    foreach ($lista as $item) {
      if($item['nome']==$post['nome'] && $item['usuario_id']!=$post['usuario_id']){
        return ["error"=>TRUE, "msg"=>"nome_de_usuario_ja_cadastrado"];
      }
    }
    if($post['senha']!=$post['conf_senha']){
      return ["error"=>TRUE, "msg"=>"senhas_nao_conferem"];
    }
    else{
      unset($post['conf_senha']);
      $post['senha'] = password_hash($post['senha'], PASSWORD_DEFAULT);
    }
    $query = $this->pdo->prepare('UPDATE usuarios SET nome=:nome, email=:email, senha=:senha, data=:data WHERE usuario_id=:usuario_id')->execute($post);
    return ["error"=>FALSE, "msg"=>"update_ok"];
  }
}

?>
