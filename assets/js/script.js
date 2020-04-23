$(window).on('load', function () {
  $('#preloader .inner').fadeOut();
  $('#preloader').delay(350).fadeOut('slow'); 
  $('body').delay(350).css({'overflow': 'visible'});
})

$(document).ready(function(){

  "use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

  const BASE_URL = 'http://localhost/projetos_reais/getbook/';
  var imagem = '<img class="img" src="../images/spin-preloader.gif" />';

/* login */
$('#form-login').on('submit', function(e){
  e.preventDefault();

  var formulario = document.getElementById('form-login');

  var formData = new FormData(formulario);

    $.ajax({
      type: 'POST',
      url: 'login',
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function() {
        var caminho = BASE_URL+'assets/images/spin-preloader.gif';
        $('.retorno').html('<img src="'+caminho+'">');          
      },
      success: function(response) {
        //$('.retorno').html(response);
        window.location.href = 'home';
      }
    });
});

  /*  mostrando arquivo selecionao no pra upload */
  $('#arquivo').change(function(){
    $('#foto').html('<img id="img" style="width: 200px;" src="<?= BASE_URL ?>upload/<?= $item->getUrl() ?>">');
    const file = $(this)[0].files[0];
    const fileReader = new FileReader();
    fileReader.onloadend = function() {
      $('#img').attr('src', fileReader.result);
    }
    fileReader.readAsDataURL(file);
  });

  /* Adicionando um livro */
  $('#form-livro-add').on('submit', function(e){
    e.preventDefault();

    var formulario = document.getElementById('form-livro-add');

    var formData = new FormData(formulario);

    var arquivos = $('#arquivo')[0].files;

    if(arquivos.length > 0) {

      $.ajax({
        type: 'POST',
        url: BASE_URL+'livros/adicionar',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function() {
          var caminho = BASE_URL+'assets/images/spin-preloader.gif';
          $('.retorno').html('<img src="'+caminho+'">');          
        },
        success: function(response) {
          $('.retorno').html(response);
          setTimeout(() => {
            window.location.href = BASE_URL+'livros';
          }, 1500);
        }
      });
    }
  })

  /* Editando um livro */
  $('#form-livro-editar').on('submit', function(e){
    e.preventDefault();

    var id = document.getElementById("id").value;

    var formulario = document.getElementById('form-livro-editar');

    var formData = new FormData(formulario);

    var arquivos = $('#arquivo')[0].files;

    if(arquivos.length > 0) {

      //formData.append('arquivo', arquivos[0]);

      $.ajax({
        type: 'POST',
        url: BASE_URL+'livros/editar/'+id,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function() {
          var caminho = BASE_URL+'assets/images/spin-preloader.gif';
          $('.retorno').html('<img src="'+caminho+'">');          
        },
        success: function(response) {
          $('.retorno').html(response);
          setTimeout(() => {
            window.location.href = BASE_URL+'livros';
          }, 1500);
        }
      });
    }
  })




  
})



























  /*$('.nav li').click(function(e) {
    $('.nav li').removeClass('active');
    var $this = $(this);
    if (!$this.hasClass('active')) {
        $this.addClass('active');
    }
    e.preventDefault();
  });*/
  
  /*
  beforeSend: function() {
        $('.background-login').addClass( "preloader-fill" );
        $('.form').addClass( "preloader-fill" );
        $('.preloader').html('<div class="preloader-box"></div>');
        $('.preloader-box').html('<div class="spinner-border" role="status"></div>');
      },
  */    


  /*let BASE_URL = 'http://localhost/projetos_reais/getbook/';
  

  $('#form-login').on('submit', function(e){
    e.preventDefault();

    var email = $(this).find('input[name=email]').val();
    var password = $(this).find('input[name=password]').val();

    $.ajax({
      url: 'login',
      type: 'POST',
      data: { email, password },      
      success: function(retorno) {
        console.log(retorno);
        //window.location.href = BASE_URL+'home';
      }
    });
  })
  */