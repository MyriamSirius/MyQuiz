<?php
require dirname(__DIR__).'/views/layouts/header.php';
require dirname(__DIR__).'/views/layouts/nav.php';
?>


            <div>
                <h2> <?= $quiz->title ?>
                    <span><?= $questions->count()?> questions</span>
                </h2>
            </div>

            <div>
                <h4> 
                    <?= $quiz->description ?>
                    <span class="level level--beginner">Thème <?php  $tags->each(function($tag){ echo ($tag->name . ' ');}); ?></span>
                </h4>
            </div>

            <div>
                <p><?= $quiz->user->firstname ?> <?= $quiz->user->lastname ?></p>
            </div>
            
            <form action="<?php route('quizpost') ?>" method="post">

                <div class="row">

                    <div class="col question">
                            <?php foreach ($questions as $question) : ?>
                            <div class="col alert alert-secondary " role="alert">

                            
                        <span class="level <?= $question->levels->getCssClass() ?>">
                        Niveau <?=  $question->levels->name?></span>
                        

                        <div class="question__question">
                            <?= $question->question ?>
                        </div>

                        <div class="question__choices">

                        
                       
                            <?php foreach($answers as $answer): ?>
                            <?php if($answer->questions_id == $question->id): ?>
                            
                            <div>
                                
                            
                                <input type="radio" name="<?= $question->id ?>" id="exampleRadios1" value="<?= $answer->id ?>">
                                
                                <label for="exampleRadios1">
                                <?= $answer->description?>
                                </label> 
                            </div>
                           
                            <?php endif; ?>
                            <?php endforeach; ?>
                            
                            
                        </div>
                        <div class="question__info"> 
                            <?= $question->anecdote ?>
                                    <a href="https://fr.wikipedia.org/wiki/<?= $question->wiki ?>">Wikipedia</a>
                            </div>
                        </div>
                        </div>
                        <?php endforeach ?>
                    </div>

                    

                            
                    
                </div>
                <div>
                    <input class="btn" type="submit" value="OK"/>
                </div>
            </form>

            <?php
require dirname(__DIR__).'/views/layouts/footer.php';
?>