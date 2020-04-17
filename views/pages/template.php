<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL; ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/styles.css">
  <title>Getbook</title>
</head>
<body>

<!-- início do preloader -->
<div id="preloader">
  <div class="inner">
    <h1>Getbook</h1>
    <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
    <div class="bolas">
      <div></div>
      <div></div>
      <div></div>                    
    </div>
  </div>
</div>
<!-- fim do preloader --> 
  
  <?php
  /* inicio header */
  include 'views/extra/header.php';
  /* fim header */
  $this->loadViewInTemplate($viewName, $viewData);
  ?>

  </div>
</div>

  <script type="text/javascript" src="<?= BASE_URL; ?>node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?= BASE_URL; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>