<?php
$constructor = new Constructor();

$constructor->getHead('Home');
$constructor->NavBar();
?>



<body>
  <!-- Container centralizado -->
  <div class="container my-5">
    <!-- Título do formulário -->
    <h1 class="mb-4">Exemplo de formulário com Bootstrap</h1>

    <!-- Formulário -->
    <form>
      <!-- Campo de nome -->
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required />
      </div>

      <!-- Campo de email -->
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" required />
      </div>

      <!-- Campo de mensagem -->
      <div class="form-group">
        <label for="mensagem">Mensagem:</label>
        <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required></textarea>
      </div>

      <!-- Botão de envio -->
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <!-- Tabela de dados -->
    <table class="table my-5">
      <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Mensagem</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>João</td>
          <td>joao@example.com</td>
          <td>Olá, gostei muito do seu site!</td>
        </tr>
        <tr>
          <td>Maria</td>
          <td>maria@example.com</td>
          <td>Parabéns pelo conteúdo, muito útil!</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Importando o jQuery e o Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kcevGRVH1AQ8FcLJz1hLdKBvIcOOl+" />

</body>

<body>
  <!-- Container centralizado -->
  <div class="container my-5">
    <!-- Título do formulário -->
    <h1 class="mb-4">Exemplo de formulário com Bootstrap</h1>

    <!-- Formulário -->
    <form>
      <!-- Campo de nome -->
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required />
      </div>

      <!-- Campo de email -->
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" required />
      </div>

      <!-- Campo de mensagem -->
      <div class="form-group">
        <label for="mensagem">Mensagem:</label>
        <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required></textarea>
      </div>

      <!-- Botão de envio -->
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <!-- Tabela de dados -->
    <table class="table my-5">
      <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Mensagem</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>João</td>
          <td>joao@example.com</td>
          <td>Olá, gostei muito do seu site!</td>
        </tr>
        <tr>
          <td>Maria</td>
          <td>maria@example.com</td>
          <td>Parabéns pelo conteúdo, muito útil!</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Importando o jQuery e o Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kcevGRVH1AQ8FcLJz1hLdKBvIcOOl+" />

</body>