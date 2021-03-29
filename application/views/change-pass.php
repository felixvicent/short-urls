<?php $this->load->view('common/header'); ?>

<div class="container">
  <div class="col-md-4 col-md-offset-4">
    <h2 class="col-md-12">Alterar Senha</h2>
    <form action="<?=base_url('update-pass')?>" method="post">
      <label for="" class="col-md-12">
        <?=$user->email?>
      </label>
      <label for="" class="col-md-12">
        <input type="password" name="password" id="password" placeholder="Nova senha" required>
      </label>
      <label for="" class="col-md-12">
        <input type="submit" class="btn btn-success" value="Alterar">
      </label>
    </form>
  </div>
  <div class="col-md-4 col-md-offset-4">
    <?php if($error) { ?>
      <div class="alert alert-danger" role="alert"><?=$error?></div>
    <?php } ?>

    <?php if($success) { ?>
      <div class="alert alert-success" role="alert"><?=$success?></div>
    <?php } ?>
  </div>
</div>

<?php $this->load->view('common/footer'); ?>