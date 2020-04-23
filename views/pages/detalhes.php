<?php $descricao = 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.'; ?>
<div class="container">
 <h1 class="my-2 text-muted">Detalhes do livro</h1>

 <?php foreach($viewData as $livros): ?>

 <div class="shadow mb-5 bg-white rounded">
     
   <div class="lista w-100">        
    <div style="border:0;" class="lista-item row justify-content-center col-lg-10 col-md-12 col-sm-12 col-11 w-100">
        <div class="imagem-livro row justify-content-center col-lg-2 col-md-8 col-sm-12 col-12 ml-md-5 ml-sm-3">
          <img style="width: 200px;" src="<?= BASE_URL ?>upload/<?= $livros->getUrl() ?>">
        </div>  
        <div class="conteudo col-lg-10 col-md-10 col-sm-12 col-12 ml-md-5 ml-sm-3">
          <div class="conteudo-header row justify-content-center">
            <div><h3 style="color: #027AC8; text-align: center;"class="my-2"><?= $livros->getTitulo(); ?></h3></div>
          </div>
          <div class="conteudo-body"> 
            <p style="font-size: 15px; text-align: justify; line-height: 26px;" class="text-muted"><?= $livros->getDescricao(); ?></p>
          </div>
          <div class="conteudo-footer mb-2">
            <?php if(isset($_SESSION['logado'])): ?>
            <a style="font-size:28px" href="<?= BASE_URL.'livros/editar/'.$livros->getId(); ?>" class="fa fa-edit"></a>
            <?php endif; ?>  
            <div><h5 style="text-align: center;"class="text-muted"><?= (!isset($_SESSION['logado']))?'Autor: ':''?><?= $livros->getAutor(); ?></h5></div>
            <?php if(isset($_SESSION['logado'])): ?>
            <a style="font-size:26px" href="<?= BASE_URL.'livros/deletar/'.$livros->getId(); ?>" class="fa fa-trash"></a>
            <?php endif; ?>
          </div>
          <div class="conteudo-footer mb-2">
            <h5>Votos: <?= $livros->getVotos(); ?></h5>        
          
            <h5>Paginas: <?= $livros->getPaginas(); ?></h5>        
          </div>
          <hr/>
          <div class="conteudo-footer mb-3">
          <div class="row w-100 justify-content-center">
            <a href="<?= BASE_URL.'livros/votar/'.$livros->getId(); ?>" style="color: #FFF" type="button" class="btn btn-primary col-4">VOTAR</a>        
          </div>       
          </div>  
        </div>
      </div>
   </div>
 </div>
<?php endforeach; ?>
 <div class="my-3 row justify-content-center">
    <a href="<?= BASE_URL.'home'; ?>">
      <i class="fa fa-arrow-left mt-1"></i>
      Voltar para o inicio
    </a>
 </div>
  
</div>  