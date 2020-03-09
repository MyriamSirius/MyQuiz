<?php
require dirname(__DIR__).'/views/layouts/header.php';
require dirname(__DIR__).'/views/layouts/nav.php';
?>



            

            
            <div class=" d-flex ">
            <div class="container ">

            
                <div class="col question ">
                

                    

                    
                    <div>
                        <ul>
                        <?php foreach ($tags as $tag): ?>
                            <a href="<?= route('tagsselect', ['id'=> $tag->id])?>">
                            <li><?= $tag->name ?></li>
                            </a>
                        <?php endforeach; ?>

                        </ul> 
                    </div>
                    
                
                </div>
 
            </div>
            </div>

            

               
                
            

            <?php
require dirname(__DIR__).'/views/layouts/footer.php';
?>