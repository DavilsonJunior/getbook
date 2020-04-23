<div class="container">
 <h1 class="my-2 text-muted">Livros</h1> 
  <div class="lista row justify-content-center">
  <?php if($viewData > 0 && !empty($viewData)){ ?>
    <?php if(isset($_SESSION['logado'])): ?>
    <div class="col-lg-10 p-md-0 p-3 p-sm-0 row justify-content-start">
      <a href="<?= BASE_URL ?>livros/adicionar" class="btn btn-primary" role="button">ADICIONAR</a>
    </div>
    <?php endif; ?>
  
  <?php foreach($viewData as $livros): ?>

    <div class="lista-item row justify-content-center col-lg-10 col-md-12 col-sm-12 col-11">
      <div class="imagem-livro row justify-content-center col-lg-2 col-md-3 col-sm-12 col-12">
        <img src="<?= BASE_URL ?>upload/<?= $livros->getUrl() ?>">
      </div>  
      <div class="conteudo col-lg-8 col-md-8 col-sm-12 col-12 p-0">
        <div class="conteudo-header">
          <div class="subtitulo">Votos: <?= $livros->getVotos() ?></div>
          <div><h6><?= $livros->getTitulo(); ?></h6></div>
          <div class="subtitulo">Paginas: <?= $livros->getPaginas(); ?></div>
        </div>
        <div class="conteudo-body"> 
          <p class="text-muted"><?= $livros->getDescricao(); ?></p>
        </div>
        <div class="conteudo-footer">
        <?php if(isset($_SESSION['logado'])): ?>
          <a href="<?= BASE_URL.'livros/editar/'.$livros->getId(); ?>" class="fa fa-edit"></a>
        <?php endif; ?>  
          <div class="link">
            <a href="<?= BASE_URL.'livros/detalhes/'.$livros->getId(); ?>">Clique aqui para mais detalhes</a>
            <i class="fa fa-arrow-right mt-1"></i>
          </div>
        <?php if(isset($_SESSION['logado'])): ?>
          <a href="<?= BASE_URL.'livros/deletar/'.$livros->getId(); ?>" class="fa fa-trash"></a>
        <?php endif; ?>  
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php } else { ?>
  <div class="alert alert-warning my-3 col-8 row m-auto justify-content-center" role="alert">
  Não encontramos nenhum livro cadastrado
  </div> 
<?php } ?>   

    <div class="my-3">
      <a href="<?= BASE_URL; ?>home">
        <i class="fa fa-arrow-left mt-1"></i>
        Voltar para o inicio
      </a>
    </div>

  </div>
  
</div>  








