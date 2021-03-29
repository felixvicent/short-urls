<?php $this->load->view('common/header'); ?>

<div class="container">
  <?php if($error) { ?>
    <div class="alert alert-danger" role="alert"><?=$error?></div>
  <?php } ?>

  <div class="col-md-4 col-md-offset-1">
    <h2 class="col-md-12">Login</h2>

    <form action="<?=base_url('login')?>" method="post">
      <label for="" class="col-md-12">
        <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?=set_value('email')?>" required>
      </label>
      <label for="" class="col-md-12">
        <input type="password" name="password" id="password" placeholder="Senha" class="form-control" required>
      </label>
      <label for="" class="col-md-12">
        <input type="submit" class="btn btn-success" value="Entrar">
      </label>
    </form>
  </div>

  <div class="col-md-4 col-md-offset-1">
    <h2 class="col-md-12">Cadastre-se</h2>

    <form action="<?=base_url('user/register')?>" method="POST">
      <label for="" class="col-md-12">
        <input type="text" name="name" id="name" placeholder="Nome (opcional)" class="form-control" value="<?=set_value('name')?>">
      </label>
      <label for="" class="col-md-12">
        <input type="text" name="email" id="email" placeholder="Email" class="form-control" required value="<?=set_value('email')?>">
      </label>
      <label for="" class="col-md-12">
        <input type="password" name="password" id="password" placeholder="Senha" class="form-control" required>
      </label>
      <label for="" class="col-md-12">
        <input type="submit" class="btn btn-success" value="Cadastrar">
      </label>
    </form>
  </div>
</div>

<?php $this->load->view('common/footer'); ?>