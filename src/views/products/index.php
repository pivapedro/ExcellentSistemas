<?php
$constructor = new Constructor();

$constructor->getHead('Tela de Produtos');
$constructor->NavBar();
?>


<body>
  <div class="container center">

    <div class="row">

      <div class="col my-5">
        <h2 class="mb-4 text-center" id='title'>Cadstro de Produto</h2>
        <form>
          <div class="form-group row ">
            <!--     <div class="col">
              <label for="id">ID:</label>
              <input type="text" class="form-control" id="id">
            </div> -->
            <div class="col">
              <label for="estoque">Nome:</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="col">
              <label for="estoque">Estoque:</label>
              <input type="number" class="form-control" id="estoque">
            </div>
            <div class="  col ">
              <label for="valorVenda">Valor de Venda:</label>
              <input class="form-control" id="valorVenda">
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
          <button class="btn btn-primary" onclick='' id='submit'>Cadastrar</button>
        </form>
      </div>

    </div>

  </div>


</body>
<!-- Importando o jQuery e o Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kcevGRVH1AQ8FcLJz1hLdKBvIcOOl+"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="https://cdn.skypack.dev/pin/axios@v1.3.4-n3Oyhc1YyGrZt2GWnoSM/mode=imports,min/optimized/axios.js"></script>

<script type='module'>
  import axios from 'https://cdn.skypack.dev/axios';
  const productId = localStorage.getItem('productEdit')

  const getDataProduct = async (id) => {
    try {
      const {
        data
      } = await axios.post('http://localhost:8080/api/product', {
        "product_id": productId
      })
      return data
    } catch (error) {
      console.error(error)
    }
  }

  const updateData = async (body) => {
    try {
      const {
        data
      } = axios.put('http://localhost:8080/api/product', body)
      console.log(data)

    } catch (error) {

    }
  }

  const formatter = new Intl.NumberFormat('pr-BR', {
    style: 'currency',
    currency: 'BRL',

  });

  $('#submit').click((e) => {
    e.preventDefault();
    const name = $('#name').val()
    const description = $('#descricao').val()
    let value = $('#valorVenda').maskMoney('unmasked')[0]
    const current_inventory = $('#estoque').val()
    const data = {
      name,
      description,
      value,
      current_inventory,
      "product_id": Number(productId)
    }
    productId ? updateData(data) : null
  })


  $(document).ready(async function() {
    $("#valorVenda").maskMoney({
      prefix: "R$ ",
      decimal: ",",
      thousands: "."
    });
    if (productId) {
      $('#title').html('Alteração do Produto ' + productId)
      $('#submit').html('Atualizar')
      const [data] = await getDataProduct(productId)

      $('#name').val(data.name)
      $('#descricao').val(data.description)
      $('#valorVenda').val(formatter.format(data.value))
      $('#estoque').val(data.current_inventory)

    }

  })
</script>