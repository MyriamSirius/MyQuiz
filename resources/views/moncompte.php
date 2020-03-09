<?php
require dirname(__DIR__).'/views/layouts/header.php';
require dirname(__DIR__).'/views/layouts/nav.php';
?>

<h1><?= $currentUser->firstname. ' ' . $currentUser->lastname ?></h1>
<h2><?=$currentUser->email?></h2>

<?php
require dirname(__DIR__).'/views/layouts/footer.php';
?>