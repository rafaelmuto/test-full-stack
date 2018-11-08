<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <title>CRUD - Create</title>
  </head>
  <body>

    <header>
      <h1>CRUD</h1>
      <h1>Create</h1>
      <a href="index.php">Voltar</a>
    </header>

    <div class="main_container">

      <div class="form_usuario">
        <h2>Usuarios</h2>
        <form action="switch.php?action=cadastro" method="post">
          Nome: <input type="text" name="nome" value="">
          E-mail: <input type="email" name="email" value="">
          Senha: <input type="password" name="senha" value="">
          Conf. Senha: <input type="password" name="conf_senha" value="">
          <button class="button" type="submit" name="class" value="usuarios">Cadastrar!</button>
        </form>
      </div>

      <div class="form_catProduto">
        <h2>Categoria de Produtos</h2>
        <form action="switch.php?action=cadastro" method="post">
          Nova Categoria de Produto: <input type="text" name="cat_nome" value="">
          <button class="button" type="submit" name="class" value="cat_produto">Cadastrar!</button>
        </form>
      </div>

      <div class="form_catPublicacao">
        <h2>Categoria de Publicacao</h2>
        <form action="switch.php?action=cadastro" method="post">
          Nova Categoria de Publicacao: <input type="text" name="cat_nome" value="">
          <button class="button" type="submit" name="class" value="cat_publicacao">Cadastrar!</button>
        </form>
      </div>

      <div class="form_produto">
        <form action="switch.php?action=cadastro" method="post" enctype="multipart/form-data">
          <h2>Produto</h2>
          fk_usuario_id: <input type="text" name="fk_usuario_id" value="">
          Titulo: <input type="text" name="titulo" value="">
          Imagem: <input type="file" name="imagem" value="">
          Valor: <input type="text" name="valor" value="">
          categoria: <input type="text" name="categoria" value="">
          <button class="button" type="submit" name="class" value="produtos">Cadastrar!</button>
        </form>
      </div>

      <div class="form_publicacao">
        <form  action="switch.php?action=cadastro" method="post" enctype="multipart/form-data">
          <h2>Publicacao</h2>
          fk_usuario_id: <input type="text" name="fk_usuario_id" value="">
          Titulo: <input type="text" name="titulo" value="">
          Descricao: <input type="text" name="descricao" value="">
          Conteudo: <textarea name="conteudo" rows="8"></textarea>
          Imagem: <input type="file" name="imagem" value="">
          categoria: <input type="text" name="categoria" value="">
          <button class="button" type="submit" name="class" value="publicacoes">Cadastrar!</button>
        </form>
      </div>

    </div>

  </body>
</html>
