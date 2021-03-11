<?php $title = "View Task" ?>

<?php ob_start() ?>

<div class="container">
    <h1>Task: <?= $task->getId() ?></h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"><?= $task->getText() ?></p>
        </div>
    </div>

</div>

<?php $content = ob_get_clean() ?>

<?php require('view/template.php') ?>