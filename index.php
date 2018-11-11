<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <title>Teste de Recrutamento Full Stack PHP</title>
  </head>
  <body>
    <header>
      <h1>CRUD</h1>
      <a href="Create.php">Create</a>
      <a href="Read.php">Read</a>
      <a href="Update.php">Update</a>
      <a href="Delete.php">Delete</a>
    </header>
    <div class="inst">
      <? if(isset($_GET['error']) && $_GET['error']): ?>
        <h2>ERRO: <?php echo $_GET['msg'] ?></h2>
      <? else: ?>
        <h2>Instruções</h2>
        <ol>
          <li>Rodar o arquivo <a href="mysql/crudDB.sql">crudDB.sql</a> para criar o banco de dados.</li>
          <li>Os links a cima levam às funções do CRUD.</li>
          <li>Como o banco de dados começa vazio, você deverá criar pelo menos uma entrada em cada uma das tabelas.</li>
          <li>Lembre-se que as categorias e o usuario são chaves estrangeiras para outras tabelas, portando devem conter entradas para que as outras tabelas funcionem.</li>
          <li>Por conta das atribuições de chaves estrangeiras você devera deletar todas as mensões da chave antes de deletar a chave estrangeira.</li>
        </ol>
      <? endif ?>
    </div>
  </body>
</html>
