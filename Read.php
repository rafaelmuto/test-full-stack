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
      <form action="switch.php" method="post" style="align-self: center;">
        <select name="option">
          <option value="usuarios">usuarios</option>
          <option value="produtos">produtos</option>
          <option value="publicacoes">publicacoes</option>
          <option value="catProdutos">categoria de produtos</option>
          <option value="catPublicacoes">categoria de publicacoes</option>
        </select>
        <button type="submit" name="action" value="read">Buscar</button>
      </form>
    </header>

    <?php
      if(isset($_GET['show'])){
        echo($_GET['show']);
      }
      else{
        echo("<h2>escolha a tabela a ser mostrada</h2>");
      }
     ?>



  </body>
</html>
