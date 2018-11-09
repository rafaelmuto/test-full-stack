<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <title>CRUD - Delete</title>
  </head>
  <body>

    <header>
      <h1>CRUD</h1>
      <h1>Delete</h1>
      <form action="Delete.php" method="get" style="align-self: center;">
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

    <div class="inst">
    <?php
      if(isset($_GET['show'])){
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
        echo("<h2>escolha a tabela a ser mostrada</h2>");
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
            echo '<td><a href="switch.php?action=delete&class='.$_GET["show"].'&column='.array_keys($array[0])[0].'&id='.$item[array_keys($array[0])[0]].'">deletar</a></td>';
            echo "</tr>";
          }
        ?>
     </table>
     <? endif; ?>   
   </div>
  </body>
</html>
