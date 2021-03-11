<?php $title = 'Update Task';

$message = NULL;

switch ($success) {
    case '0':
        $message = '<div class="alert alert-danger" role="alert">Problem with the update!</div>';
        break;
    case '1':
        $message = '<div class="alert alert-primary" role="alert">Task modified! <a href="index.php?action=home">Back Home</a></div>';
        break;
}

ob_start();

?>

<div class="container">
    <h1>Modify task <?= $task->getId() ?></h1>
    <?= $message ?? '' ?>
    <form action="index.php?action=modify&amp;id=<?= $task->getId() ?>" method="post">
        <input type="text" class="form-control my-3" value="<?= $newTextValue ?? $task->getText() ?>" name="newText">
        <button type="submit" class="btn btn-dark">Modify</button>
    </form>

</div>

<?php $content = ob_get_clean() ?>

<?php require('view/template.php') ?>