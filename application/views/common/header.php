<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Encurtador de URLs">
  <meta name="author" content="Félix Vicente">

  <title>Encurtador de URLs</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
  <link href="<?=base_url('assets/css/layout.css')?>" rel="stylesheet">

  <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

</head>
<body>
  <nav class="navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?=base_url()?>" class="navbar-brand">Encurtador de URLs</a>
      </div>

      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
          <li><a href="<?=base_url()?>">Home</a></li>
          <?php if($this->session->userdata('logged')) { ?>
            <li><a href="<?=base_url('my-urls')?>">Minhas URLS</a></li>
            <li><a href="<?=base_url('update-pass')?>">Alterar Senha</a></li>
            <li><a href="<?=base_url('logout')?>">Sair</a></li>
          <?php } else { ?>
            <li><a href="<?=base_url('login')?>">Login/Cadastro</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  
