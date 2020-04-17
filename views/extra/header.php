<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="home" class="logo">GET</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="<?= BASE_URL; ?>home"><span class="fa fa-home"></span> Home</a>
          </li>
          <li>
              <a href="<?= BASE_URL; ?>livros"><span class="fa fa-book"></span> Livros</a>
          </li>
          <li>
            <a href="<?= BASE_URL; ?>grafico"><span class="fa fa-signal"></span> Gráfico</a>
          </li>
          <li>
            <a href="<?= BASE_URL; ?>calendario"><span class="fa fa-calendar"></span> Calendar</a>
          </li>
          <li>
            <a href="<?= BASE_URL; ?>login"><span class="fa fa-envelope"></span> login</a>
          </li>
          <li>
            <a href="<?= BASE_URL; ?>sair"><span class="fa fa-power-off"></span> Sair</a>
          </li>
        </ul>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary btn-menu">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL; ?>home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>livros">Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>grafico">Gráfico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>calendario">Calendário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL; ?>sair">Sair</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
       