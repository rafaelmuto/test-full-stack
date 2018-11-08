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
      <h1>CRUD - Read</h1>
      <form action="Read.php" method="get" style="align-self: center;">
        <select name="show">
          <option value="usuarios">usuarios</option>
          <option value="produtos">produtos</option>
          <option value="publicacoes">publicacoes</option>
          <option value="catProdutos">categoria de produtos</option>
          <option value="catPublicacoes">categoria de publicacoes</option>
        </select>
        <button type="submit">Buscar</button>
      </form>
    </header>

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
            // code...
            break;

          case 'publicacoes':
            include "classes/publicacao.class.php";
            $array = (new publicacao)->listar();
            // code...
            break;

          case 'catProdutos':
            include "classes/categorias.class.php";
            $array = (new catProduto)->listar();
            // code...
            break;

          case 'catPublicacoes':
            include "classes/categorias.class.php";
            $array = (new catPublicacao)->listar();
            // code...
            break;
        }
        // echo "<pre>";
        // var_dump($array);
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
            foreach ($item as $value) {
              echo "<td>".$value."</td>";
            }
            echo "</tr>";
          }
        ?>
     </table>
     <? endif; ?>


  </body>
</html>
