<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <title>CRUD - Read</title>
  </head>
  <body>

    <header>
      <h1>CRUD</h1>
      <h1>Update</h1>
      <form action="Update.php" method="get" style="align-self: center;">
        <select name="show">
          <option value="usuarios">usuarios</option>
          <option value="produtos">produtos</option>
          <option value="publicacoes">publicacoes</option>
          <option value="cat_produto">categoria de produtos</option>
          <option value="cat_publicacao">categoria de publicacoes</option>
        </select>
        <button type="submit">Buscar</button>
      </form>
      <a href="index.php">Voltar</a>
    </header>


    <?php
      if(isset($_GET['show']) && !isset($_GET['form'])){
        switch ($_GET['show']) {
          case 'usuarios':
            include "classes/usuario.class.php";
            $array = (new usuario)->listar();
            break;

          case 'produtos':
            include "classes/produto.class.php";
            $array = (new produto)->listar();
            break;

          case 'publicacoes':
            include "classes/publicacao.class.php";
            $array = (new publicacao)->listar();
            break;

          case 'cat_produto':
            include "classes/categorias.class.php";
            $array = (new catProduto)->listar();
            break;

          case 'cat_publicacao':
            include "classes/categorias.class.php";
            $array = (new catPublicacao)->listar();
            break;
        }
      }
      else{
        if(!isset($_GET['form'])){
          echo("<div class='inst'><h2>escolha a tabela a ser mostrada</h2></div>");
        }
      }
     ?>

     <? if(isset($array)): ?>
     <table>
       <tr>
         <?php
            foreach ($array[0] as $key => $value) {
              echo "<th>".$key."</th>";
            }
          ?>
       </tr>
       <?php
          foreach ($array as $item) {
            echo "<tr>";
            foreach ($item as $key => $value) {
              if($key=='imagem'){
                echo "<td><a href='".$value."'><img class='thumb' src='".$value."'></a></td>";
              }
              else{
                echo "<td>".$value."</td>";
              }

            }
            echo '<td><a href="Update.php?form=TRUE&tabela='.$_GET["show"].'&column='.array_keys($array[0])[0].'&id='.$item[array_keys($array[0])[0]].'">update</a></td>';
            echo "</tr>";
          }
        ?>
     </table>
     <? endif; ?>
     <? if(isset($_GET['form'])): ?>
        <div class="inst">
        <form action="switch.php?action=update&class=<?php echo $_GET['tabela'] ?>" method="post" enctype="multipart/form-data">
        <?php
          echo '<h2>'.$_GET['tabela'].'</h2>';
          $query = 'SELECT * FROM '.$_GET['tabela'].' WHERE '.$_GET['column'].'='.$_GET['id'];
          include "classes/db.class.php";
          $return = (new db)->runQuery($query);
          foreach ($return[0] as $key => $value) {
            echo $key.': ';
            switch ($key) {
              case array_keys($return[0])[0]:
                echo $value.'<br>';
                echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
                break;

              case 'senha':
                echo '<input type="password" name="'.$key.'" value="">';
                echo 'confirmar senha: ';
                echo '<input type="password" name="conf_'.$key.'" value="">';
                break;

              case 'fk_usuario_id':
                echo '<select class="select_longo" name="fk_usuario_id">';
                include "classes/usuario.class.php";
                $usuarios = (new usuario)->listar();
                foreach ($usuarios as $item) {
                echo '<option value="'.$item['usuario_id'].'">'.$item['nome'].'</option>';
                }
                echo '</select>';
                break;

              case 'imagem':
                echo '<br><a href="'.$value.'"><img class="thumb" src="'.$value.'"></a>';
                echo '<input type="file" name="imagem" accept="image/png, image/jpeg">';
                break;

              case 'conteudo':
                echo '<textarea name="conteudo" rows="8">'.$value.'</textarea>';
                break;

              case 'categoria':
                if($_GET['tabela']=='produtos'){
                  echo '<select class="select_longo" name="categoria">';
                  include "classes/categorias.class.php";
                  $options = (new catProduto)->listar();
                  foreach ($options as $item) {
                    echo '<option value="'.$item['cat_produto_id'].'">'.$item['cat_nome'].'</option>';
                  }
                  echo '</select>';
                }
                else{
                  echo '<select class="select_longo" name="categoria">';
                  include "classes/categorias.class.php";
                  $options = (new catPublicacao)->listar();
                  foreach ($options as $item) {
                    echo '<option value="'.$item['cat_publicacao_id'].'">'.$item['cat_nome'].'</option>';
                  }
                  echo '</select>';
                }
                break;

              default:
                echo '<input type="text" name="'.$key.'" value="'.$value.'">';
                break;
            }
          }
          echo '<button type="submit">update</button>';
        ?>
        </form>
        </div>
     <? endif; ?>


  </body>
</html>
