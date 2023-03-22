<?php
$constructor = new Constructor();

$constructor->getHead('Tela de Produtos');
$constructor->NavBar();
?>


<body>
  <div class="container center">

    <div class="row">

      <div class="col my-5">
        <h1 class="my-5">Lista de Produtos</h1>
        <div class='d-flex justify-content-end '>
          <button type="button" class="btn btn-success my-2">Cadastro de Produto</button>
        </div>
        <table class="table my-2">
          <thead>
            <tr>
              <th>ID</th>
              <th>Descrição</th>
              <th>Valor de Venda</th>
              <th>Estoque</th>
              <th>Imagens</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <!-- Exemplo de produto na lista -->
            <tr>
              <td>1</td>
              <td>Produto A</td>
              <td>R$ 99,99</td>
              <td>10</td>
              <td>
                <img src="https://via.placeholder.com/45x45" alt="Imagem do Produto A">
              </td>
              <td class="text-end">
                <button type="button" class="btn btn-primary">Editar</button>
                <button type="button" class="btn btn-danger">Excluir</button>
              </td>
            </tr>
            <!-- Fim do exemplo -->
          </tbody>
        </table>
      </div>

    </div>

  </div>


</body>
<!-- Importando o jQuery e o Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kcevGRVH1AQ8FcLJz1hLdKBvIcOOl+" />