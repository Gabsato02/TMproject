<!DOCTYPE html>

<html lang="ot-br">

<head>

  <meta charset="UTF-8">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script src='https://kit.fontawesome.com/8e2f41b6ca.js' crossorigin='anonymous' defer></script>

  <title>TM Project - Jogos</title>

</head>

<body>

  <?php include('layouts/header.php'); ?>

  <main class='m-5'>

    <h1 class='display-6 pt-5 pb-3'>Jogos</h1>

    <form>

      <div class='row'>

        <div class='form-group col-3'>
          <label for='name'>Título</label>
          <input 
            type='text' 
            name='name' 
            class='form-control' 
            placeholder='ex. God of War'
          >
        </div>

        <div class='form-group col-3'>
          <label for='genre'>Gênero</label>
          <input 
            type='text' 
            name='genre' 
            class='form-control' 
            placeholder='ex. Aventura'
          >
        </div>

        <div class='form-group col-3'>
          <label for='platform'>Plataforma</label>
          <input 
            type='text' 
            name='platform' 
            class='form-control' 
            placeholder='ex. PS4'
          >
        </div>

        <div class='form-group col-3'>
          <label for='rating'>Nota</label>
          <input 
            type='number' 
            name='rating' 
            class='form-control' 
            min='0' 
            max='10' 
            placeholder='ex. 10'
          >
        </div>

      </div>

      <div class='row mt-2'>

        <div class='form-group col-6'>
          <label for='description'>Descrição</label>
          <textarea 
            name='description' 
            class="form-control" 
            rows="3" 
            style="resize: none"
            >
          </textarea>
        </div>

        <div class='form-group col-6'>
          <label for='observation'>Observações</label>
          <textarea 
            name='observation' 
            class="form-control" 
            rows="3" 
            style="resize: none"
            >
          </textarea>
        </div>

      </div>

      <div class='row'>
        <div class='form-group d-flex justify-content-end'>
          <button class='btn btn-md btn-success mt-2 w-25 justify-self-end'>Salvar</button>
        </div>
      </div>

    </form>

  </main>

  <?php include('layouts/footer.php'); ?>

</body>

</html>