<nav>
    <div class="navbar ">




        <ul>
            <li>
                <a class="navbar navbar-brand" href="#">
                    <h1>My Quiz</h1>
                </a>
            </li>

            <li class="navbar nav-item">
                <a class="nav-link" href="<?= route('home') ?>">
                    <i></i>
                    Accueil
                </a>
            </li>

            <li class="navbar nav-item">
                <a class="nav-link" href="<?= route('tags') ?>">
                    <i></i>
                    Selection par thème
                </a>
            </li>

            <?php if ($isConnected): ?>

            <li>
                <?php if ($isAdmin): ?>
                    <a class="navbar navbar-brand" href="#">
                        <h1>Admin</h1>
                    </a>
                <?php endif; ?>
                </li>
            <li class="navbar nav-item">
                <a class="nav-link" href="<?= route('moncompte') ?>">
                    <i></i>
                    Mon compte
                </a>
            </li>
            <li class="navbar nav-item">
                <a class="nav-link" href="<?= route('loggout') ?>">
                    <i></i>
                    Déconnexion
                </a>
            </li>
            <?php else: ?>
        
            
            <li class="navbar nav-item">
                <a class="nav-link" href="<?= route('signin') ?>">
                    <i></i>
                    Mon compte
                </a>
            </li>

            <li class="navbar nav-item">
                <a class="nav-link" href="<?= route('signup') ?>">
                    <i></i>
                    Créer un compte
                </a>
            </li>

            <?php endif; ?>

            
            
        </ul>
    </div>
</nav>