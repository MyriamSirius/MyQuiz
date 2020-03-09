<?php
require dirname(__DIR__).'/views/layouts/header.php';
require dirname(__DIR__).'/views/layouts/nav.php';
?>






            <div>
                <h2> Bienvenue sur My Quiz </h2>
                <p>

                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                
                </p>
            </div>

            <div class=" d-flex ">
            <div class="container row justify-content-around">

                <?php foreach ($quizzesCollection as $quiz):  ?>

                <a 
                href= "<?= route ('quiz', ['id'=> $quiz->id])?>"
                 class="alert-link text-decoration-none" >
                    <div class="col m-2 alert alert-secondary " role="alert">
                        

                                <h3><?= $quiz->title ?></h3>

                                <h5><?= $quiz->description ?></h5>
                                <p><?= $quiz->user->firstname ?> <?= $quiz->user->lastname ?>
                                </p>
                    </div>
                </a>
                    
                            

                <?php endforeach; ?>

                
               
            </div>
            </div>

<?php
require dirname(__DIR__).'/views/layouts/footer.php';
?>