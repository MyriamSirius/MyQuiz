<?php
require dirname(__DIR__).'/views/layouts/header.php';
require dirname(__DIR__).'/views/layouts/nav.php';
?>

<div>
                <h2> <?= $quiz->title ?> 
                    <span><?= $quiz->questions->count()?> questions</span>
                </h2>
            </div>

            <div>
                <h4> 
                <?= $quiz->description ?>
                <span class="level level--beginner">Thème <?php  $quiz->tags->each(function($tag){ echo ($tag->name . ' ');}); ?></span>
                </h4>
            </div>

            <div>
                <p>by <?= $quiz->user->firstname ?> <?= $quiz->user->lastname ?></p>
            </div>
            <div class=" d-flex ">
            <div class="container ">

            
                <div class="col question ">
                <?php foreach ($quiz->questions as $question) : ?>

                    <span class="level <?= $question->levels->getCssClass() ?>">
                    Niveau <?=  $question->levels->name?></span>

                    <div class="question__question col">
                    <?= $question->question ?>
                    </div>
                    <div>
                        <ul>
                        <?php foreach($question->answers as $index => $answer): ?>
                        
                            <li><?= $index + 1 . ' - ' . $answer->description?></li>
                        
                        <?php endforeach; ?>

                        </ul> 
                    </div>
                    
                 <?php endforeach ?>
                </div>
 
            </div>
            </div>

            

               
                
            

            <?php
require dirname(__DIR__).'/views/layouts/footer.php';
?>