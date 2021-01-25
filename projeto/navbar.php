
<nav class="navbar navbar-expand-lg navbar-light">
  <div id="imagem">
    <a href="index.php">  <img src="imagens/venus.png" width="115"></a>
  </div>
  <div class="container">
    <a href="index.php">
      <div class="btncomum">
        <button type="button" class="btn btn-dark" > <h5> Home </h5> </button>
      </div>
    </a>
    <a href="produtos.php">
      <div class="btncomum">
        <button type="button" class="btn btn-outline-dark" > <h5> Produtos </h5> </button>
      </div>
    </a>
    <a href="desenvolvimento.php">
      <div class="btncomum">
        <button type="button" class="btn btn-outline-dark" > <h5> Sobre nós </h5> </button>
      </div>
    </a>
    <a href="cadastro.php">
      <div class="btncomum">
        <button type="button" class="btn btn-outline-dark" > <h5> Cadastro </h5> </button>
      </div>
    </a>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" id="entrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php session_start();
            if($_SESSION["logou"]=="s")
            { echo $_SESSION["nome"];  }
            else
            {echo "User";}
        ?>
      </button>
      <?php
        if($_SESSION["logou"]!="s")
        { ?>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="loginpag.php">Login</a>
          </div>
          <?php
        }
        else if($_SESSION["admin"]=="s")
        { ?>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="tabela_venda.php">Administração</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
          <?php
        }
        else
        { ?>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
          <?php
        }
      ?>
    </div>
    <ul class="navbar-nav ml-auto mr-3 ">
      <a href="carrinhopg.php">
        <button type="button" class="btn btn-outline-dark"><i class="fas fa-shopping-cart"></i></button>
      </a>
    </ul>
  </div>
</nav>