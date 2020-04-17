<div class="container-fluid">

    <h1 class="my-3">Adicionar um livro</h1>
    <form  id="form-livro-add" method="POST" enctype="multipart/form-data" class="col s12">

      <div class="row">
        <div class="form-group col-lg-5 col-md-8 col-sm-9 col-11 p-0">
          <label for="titulo">Titulo</label>
          <input class="form-control" id="titulo" name="titulo" type="text" autofocus>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-lg-4 col-md-6 col-sm-7 col-8 p-0 mr-sm-3 mr-3">
          <label for="autor">Autor</label>
          <input class="form-control" id="autor" name="autor" type="text">
        </div>

        <div class="form-group col-lg-1 col-md-2 col-sm-2 col-3">
          <label for="paginas">Paginas</label>
          <input class="form-control" id="paginas" name="paginas" type="number">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-lg-5 col-md-8 col-sm-9 col-11 p-0">
          <label for="descricao">Descrição</label>
          <textarea class="form-control" id="descricao" name="descricao" rows="6"></textarea>
        </div>
      </div>
  
      <div class="row my-3">
        <div class="custom-file col-lg-5 col-md-8 col-sm-9 col-11 p-0">
          <input type="file" class="custom-file-input" name="arquivo" id="arquivo">
          <label class="custom-file-label" for="arquivo">Escolha a imagem do livro</label>
        </div>
      </div>

      <div class="row mb-3">
        <div id="foto" class="form-group col-lg-5 col-md-8 col-sm-9 col-11 p-0">
          
        </div>
      </div>

      <div class="row">
        <button type="submit" class="btn btn-primary">ADICIONAR</button>        
      </div>

      <div class="row mt-3">
        <div class="retorno"></div>        
      </div>

    </form>  
    
    <div class="my-3">
      <a href="<?= BASE_URL ?>livros">
        <i class="fa fa-arrow-left mt-1"></i>
        Voltar
      </a>
    </div>
</div>    