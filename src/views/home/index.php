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
          <button type="button" class="btn btn-success my-2" onclick='goToNew()'>Cadastro de Produto</button>
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
          <tbody id='tablebody'>

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
                <td> <?php if (count($data['imagens'])) {
                        array_map(function ($imagem) {
                      ?> <img src='data:image/png;base64,<?php echo $imagem['image_src'] ?>' width="50" />
                  <?php
                        }, $data['imagens']);
                      }
                  ?>
                </td>


                <td class="text-end">
                  <button type="button" class="btn btn-primary" onclick="goToEdit(<?php echo $data['product_id'] ?>)">Editar</button>
                  <button type="button" class="btn btn-danger" onclick="saveIDdelete(<?php echo $data['product_id'] ?>)" data-toggle="modal" data-target="#exampleModal">Excluir</button>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deletar Produto?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Aviso você perderar todos os dados do produto.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <div data-dismiss="modal">
            <button type="button" id='delete' class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmation" onclick="deleteProduct()">
              <span>Deletar</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalConfirmation" tabindex="-1" role="dialog" aria-labelledby="modalConfirmation" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Produto Deletado!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Dados Deletados com sucesso!.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

</body>
<!-- Importando o jQuery e o Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.skypack.dev/pin/axios@v1.3.4-n3Oyhc1YyGrZt2GWnoSM/mode=imports,min/optimized/axios.js"></script>


<script type='module'>
  import axios from 'https://cdn.skypack.dev/axios';
  const goToEdit = (id) => {
    localStorage.setItem('productEdit', id)
    return window.location.href = '/product'
  }

  const goToNew = (id) => {
    localStorage.clear()
    return window.location.href = '/product'
  }

  function saveIDdelete(id) {
    localStorage.setItem('delete', id)

  }
  const updateTable = async () => {
    const {
      data
    } = await axios.get(`http://localhost:8080/api/products`)
    const html = data.map(product => ` <tr>
                <td>${product.product_id}</td>
                <td>${product.name}</td>
                <td>${product.description}</td>
                <td>${product.value}</td>
                <td>${product.current_inventory}</td>
                <td> <${!!product.imagens.length && product.imagens.map(image => ` <img src='data:image/png;base64,${image.image_src}' width="50" />`)}
             
                </td>


                <td class="text-end">
                  <button type="button" class="btn btn-primary" onclick="goToEdit(${product.product_id})">Editar</button>
                  <button type="button" class="btn btn-danger" onclick="saveIDdelete(${product.product_id})" data-toggle="modal" data-target="#exampleModal">Excluir</button>
                </td>
              </tr>`)
    $("#tablebody").html(html.map(image => image))  

  }
  const deleteProduct = async () => {

    const productId = localStorage.getItem('delete')
    try {
      const {
        data
      } = await axios.delete('http://localhost:8080/api/product', {
        data: {
          "product_id": productId
        }
      })
      localStorage.clear('productEdit')
      updateTable()
      console.log(data)
    } catch (error) {
      console.error(error)
    }
  }
  $('#delete').click(e => {
    e.preventDefault()
    deleteProduct()

  })
  window.goToEdit = goToEdit
  window.goToNew = goToNew
  window.saveIDdelete = saveIDdelete
  window.deleteProduct = deleteProduct
</script>