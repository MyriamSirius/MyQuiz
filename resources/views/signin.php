<?php
require dirname(__DIR__).'/views/layouts/header.php';
require dirname(__DIR__).'/views/layouts/nav.php';
?>
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    <?php foreach ($errors as $Error) : ?>
        <?= $Error ?><br>
    <?php endforeach; ?>
    </div>
<?php endif; ?>

<h2>
    Connexion
</h2>

<!-- Signin form -->
<form action="" method="POST">

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" value="<?= $values['email'] ?? '' ?>" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrer email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<!-- // Ajout link signup -->
<p class="mt-3">
  <a href="<?= route('signup'); ?>"> Pas encore de compte ? Inscrivez vous ! </a>
</p>
<?php
require dirname(__DIR__).'/views/layouts/footer.php';
?>