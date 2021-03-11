<?php $title = "Error" ?>

<?php ob_start() ?>

<div class="container">
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>

</div>

<?php $content = ob_get_clean() ?>

<?php require('view/template.php') ?>