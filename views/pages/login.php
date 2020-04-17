<div class="background-login">
  <div class="form"> 
       
    <h1>GETBOOK</h1>
    <form action="home" id="form-login" method="POST" class="col s12">  
      <div class="row">
        <div class="form-group col-11 mt-1">
          <label for="name">Username</label>
          <input class="form-control" id="email" name="email" type="email" autofocus>
        </div>
      </div>
      <div class="preloader">
     
      </div>
      <div class="row">
        <div class="form-group col-11">
          <!-- <i class="material-icons prefix">account_circle</i> -->
          <label for="password">Password</label>
          <input class="form-control" id="password" name="password" type="password">          
        </div>
      </div>

      <div class="row">
        <button type="submit" class="btn btn-primary col-10">ENTRAR</button>
        
      </div>

    </form>  
    <div class="link mt-1">
      <a href="<?= BASE_URL; ?>home">Continuar sem logar</a>
      <i class="fa fa-arrow-right mt-1"></i>
    </div>
  </div>
</div>