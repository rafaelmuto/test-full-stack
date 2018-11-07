<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <title>Teste de Recrutamento Full Stack PHP - Cadastro de Usuario</title>
  </head>
  <body>

    <header>
      <h1>crudDB - Cadastro de Usuario</h1>
    </header>

    <div class="main">
      <form action="switch.php" method="post">
        Nome: <input type="text" name="nome" value="">
        E-mail: <input type="text" name="email" value="">
        Senha: <input type="password" name="senha" value="">
        Conf. Senha: <input type="password" name="conf_senha" value="">
        <button type="submit" name="action" value="cadastro">Cadastrar!</button>
      </form>
    </div>


  </body>
</html>
