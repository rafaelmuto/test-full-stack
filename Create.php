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

      <div class="usuarios">
        <h2>Usuarios</h2>
        <form action="switch.php?action=cadastro&tabela=usuarios" method="post">
          Nome: <input type="text" name="nome" value="">
          E-mail: <input type="email" name="email" value="">
          Senha: <input type="password" name="senha" value="">
          Conf. Senha: <input type="password" name="conf_senha" value="">
          <button class="button" type="submit">Cadastrar!</button>
        </form>
      </div>

      <div class="cat_produto">
        <h2>Categoria de Produtos</h2>
        <form action="switch.php?action=cadastro&tabela=cat_produto" method="post">
          Nova Categoria de Produto: <input type="text" name="cat_nome" value="">
          <button class="button" type="submit">Cadastrar!</button>
        </form>
      </div>

      <div class="cat_publicacao">
        <h2>Categoria de Publicacao</h2>
        <form action="switch.php?action=cadastro&tabela=cat_publicacao" method="post">
          Nova Categoria de Publicacao: <input type="text" name="cat_nome" value="">
          <button class="button" type="submit">Cadastrar!</button>
        </form>
      </div>

      <div class="produtos">
        <form action="switch.php?action=cadastro&tabela=produtos" method="post" enctype="multipart/form-data">
          <h2>Produto</h2>
          Usuario:
          <select class="select_longo" name="fk_usuario_id">
            <?php
              include "classes/usuario.class.php";
              $usuarios = (new usuario)->listar();
              foreach ($usuarios as $item) {
                echo '<option value="'.$item['usuario_id'].'">'.$item['nome'].'</option>';
              }
            ?>
          </select>
          Titulo: <input type="text" name="titulo" value="">
          Imagem: <input type="file" name="imagem" value="" accept="image/png, image/jpeg">
          Valor: <input type="text" name="valor" value="">
          Categoria:
          <select class="select_longo" name="categoria">
            <?php
              include "classes/categorias.class.php";
              $options = (new catProduto)->listar();
              foreach ($options as $item) {
                echo '<option value="'.$item['cat_produto_id'].'">'.$item['cat_nome'].'</option>';
              }
             ?>
          </select>
          <button class="button" type="submit">Cadastrar!</button>
        </form>
      </div>

      <div class="publicacoes">
        <form  action="switch.php?action=cadastro&tabela=publicacoes" method="post" enctype="multipart/form-data">
          <h2>Publicacao</h2>
          Usuario:
          <select class="select_longo" name="fk_usuario_id">
            <?php
              foreach ($usuarios as $item) {
                echo '<option value="'.$item['usuario_id'].'">'.$item['nome'].'</option>';
              }
            ?>
          </select>
          Titulo: <input type="text" name="titulo" value="">
          Descricao: <input type="text" name="descricao" value="">
          Conteudo: <textarea name="conteudo" rows="8"></textarea>
          Imagem: <input type="file" name="imagem" value="" accept="image/png, image/jpeg">
          Categoria:
          <select class="select_longo" name="categoria">
            <?php
              $options = (new catPublicacao)->listar();
              foreach ($options as $item) {
                echo '<option value="'.$item['cat_publicacao_id'].'">'.$item['cat_nome'].'</option>';
              }
             ?>
          </select>
          <button class="button" type="submit">Cadastrar!</button>
        </form>
      </div>

    </div>

  </body>
</html>
