<?php
include_once "db.class.php";

/**
 *  Classe produto cuida das publicacoes
 */
class publicacao extends db
{
  protected $pdo;

  public function listar(){
    return $this->pdo->query('SELECT * FROM publicacoes')->fetchall(PDO::FETCH_ASSOC);
  }

  protected function getImage(){
    if(!is_dir("img_publicacoes/")){
      mkdir("img_publicacoes/");
    }
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error']==UPLOAD_ERR_OK){
      $timestamp = date("YmdHis");
      $file_ext = explode(".", strtolower($_FILES['imagem']['name']));
      $file_name = "img_publicacoes/".$timestamp.".". $file_ext[1];
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
    $query = $this->pdo->prepare('INSERT INTO publicacoes(`fk_usuario_id`, `titulo`, `descricao`, `conteudo`, `imagem`, `categoria`) VALUES(:fk_usuario_id, :titulo, :descricao, :conteudo, :imagem, :categoria)');
    $query->execute($post);
    return ["error"=>FALSE, "msg"=>'publicacao_cadastrada'];
  }
}
 ?>
