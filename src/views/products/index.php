<?php
$constructor = new Constructor();

$constructor->getHead('Tela de Produtos');
$constructor->NavBar();
?>


<body>
  <div class="container center">

    <div class="row">

      <div class="col my-5">
        <h2 class="mb-4 text-center">Cadastro de Produtos</h2>
        <form>
          <div class="form-group row ">
        <!--     <div class="col">
              <label for="id">ID:</label>
              <input type="text" class="form-control" id="id">
            </div> -->
            <div class="col">
              <label for="estoque">Estoque:</label>
              <input type="text" class="form-control" id="estoque">
            </div>
            <div class="  col ">
              <label for="valorVenda">Valor de Venda:</label>
              <input type="text" class="form-control" id="valorVenda">
            </div>
          </div>

          <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea type="text" class="form-control" id="descricao"></textarea>
          </div>

          <div class="form-group">

          </div>
          <div class="form-group my-4">
            <label for="imagens">Imagem:</label>
            <input type="file" class="form-control-file" id="imagens">
          </div>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>

    </div>

  </div>


</body>
<!-- Importando o jQuery e o Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kcevGRVH1AQ8FcLJz1hLdKBvIcOOl+" />