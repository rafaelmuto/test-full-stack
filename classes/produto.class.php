<?php
include_once "db.class.php";

/**
 *  Classe produto cuida dos produtos
 */
class produto extends db
{
  protected $pdo;

  public function listar(){
    return $this->pdo->query('SELECT * FROM produtos')->fetchall(PDO::FETCH_ASSOC);
  }

  protected function getImage(){
    if(!is_dir("img_produtos/")){
      mkdir("img_produtos/");
    }
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error']==UPLOAD_ERR_OK){
      $timestamp = date("YmdHis");
      $file_ext = explode(".", strtolower($_FILES['imagem']['name']));
      $file_name = "img_produtos/".$timestamp.".". $file_ext[1];
      $file = $_FILES['imagem']['tmp_name'];
      move_uploaded_file($file, $file_name);
      return $file_name;
    }
    else{
      return FALSE;
    }
  }

  public function add($post){
    $post['imagem'] = $this->getImage();
    $query = $this->pdo->prepare('INSERT INTO produtos(`fk_usuario_id`, `titulo`, `imagem`, `valor`, `categoria`) VALUES(:fk_usuario_id, :titulo, :imagem, :valor, :categoria)');
    $query->execute($post);
    return ["error"=>FALSE, "msg"=>'produto_cadastrado'];
  }

  public function update($post){
    $post['imagem'] = $this->getImage();
    if(!$post['imagem']){
      $query = 'SELECT imagem FROM produtos WHERE produto_id='.$post['produto_id'];
      $post['imagem'] = $this->pdo->query($query)->fetchAll(PDO::FETCH_COLUMN)[0];
    }
    $query = $this->pdo->prepare('UPDATE produtos SET fk_usuario_id=:fk_usuario_id, titulo=:titulo, valor=:valor, categoria=:categoria, data=:data, imagem=:imagem WHERE produto_id=:produto_id')->execute($post);
    return ["error"=>FALSE, "msg"=>"update_ok"];
  }
}


 ?>
