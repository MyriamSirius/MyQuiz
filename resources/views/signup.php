<?php
require dirname(__DIR__).'/views/layouts/header.php';
require dirname(__DIR__).'/views/layouts/nav.php';
?>
    
        <form action="<?= route('signup'); ?>" method="POST">
        <div class="form-row">
            <?php if(!empty($errors)) : ?>
                <?php foreach ($errors as $error): ?>
                    <div><?=$error. '' ?> </div>
                <?php endforeach; ?>
            <?php endif ?>
            <div class="form-group col-md-12">
            <label for="email">Email</label>
            <input type="email" value="<?= $values['email'] ?? '' ?>" class="form-control" id="email" name="email" placeholder="Email">
             
            </div>
            <div class="form-group col-md-6">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
             
            </div>
            <div class="form-group col-md-6">
            <label for="confirmPassword">Confirme ton mot de passe</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"> 
            </div>
            <div class="form-group col-md-6">
            <label for="firstname">Prénom</label>
            <input type="texte" value="<?= $values['firstname'] ?? '' ?>" class="form-control" id="firstname" name="firstname" placeholder="Ton prénom">
            
            </div>
            <div class="form-group col-md-6">
            <label for="name">Nom</label>
            <input type="texte" value="<?= $values['name'] ?? '' ?>" class="form-control" id="name" name="name" placeholder="Ton nom">
             
            </div>
        </div>
        

        
       
        
        <button type="submit" class="btn btn-primary">
            <h3 class="text-white">Valider</h3> 
            <p>Bienvenue chez O'Quiz, Amuses-toi bien !</p>
        </button>
        </form>
        <!-- // Ajout link signin -->
<p class="mt-3">
  <a href="<?= route('signin'); ?>"> Déjà un compte ? Connectez vous ! </a>
</p>


        <?php
require dirname(__DIR__).'/views/layouts/footer.php';
?>