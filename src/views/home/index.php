<?php

use Controllers\ProductsController;

$constructor = new Constructor();

$constructor->getHead('Tela de Produtos');
$constructor->NavBar();

$productsController = new ProductsController()
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
              <th>Nome</th>
              <th>Descrição</th>
              <th>Valor de Venda</th>
              <th>Estoque</th>
              <th>Imagens</th>
              <th class="text-end">Ações</th>
            </tr>
          </thead>
          <tbody>

            <!-- Exemplo de produto na lista -->
            <?php
            array_map(function ($data) {
            ?>
              <tr>
                <td><?php echo $data['product_id'] ?></td>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['description'] ?></td>
                <td><?php echo $data['value'] ?></td>
                <td><?php echo $data['current_inventory'] ?></td>
                <td></td>


                <td class="text-end">
                  <button type="button" class="btn btn-primary" onclick="goToEdit(<?php echo $data['product_id'] ?>)">Editar</button>
                  <button type="button" class="btn btn-danger">Excluir</button>
                </td>
              </tr>
            <?php
            }, $productsController->getAllProducts())

            ?>
            <!-- Fim do exemplo -->
          </tbody>
        </table>
      </div>

    </div>

  </div>


</body>
<!-- Importando o jQuery e o Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kcevGRVH1AQ8FcLJz1hLdKBvIcOOl+"></script>


<script>
  const goToEdit = (id) => {
    localStorage.setItem('productEdit', id)
    return window.location.href = '/product'
  }
  window.onload(() => {})
</script>