<?php $title = 'To Do List of Taks'; ?>

<?php

switch ($success) {
    case 'Y':
        $message = '<div class="alert alert-primary" role="alert">Added!</div>';
        break;
    case 'N':
        $message = '<div class="alert alert-danger" role="alert">Problem with the insert!</div>';
        break;
}


?>


<?php ob_start() ?>

<div class="container">
    <h1>The Things We Need TO-DO</h1>

    <?= $message ?? "" ?>

    <form action="index.php?action=home" method="post">
        <input class="form-control mb-3" type="text" name="myText">
        <button type="submit" class="btn btn-success mb-3">Add</button>
    </form>

    <?php

    foreach ($tasks as $task) {
    ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Task <?= $task->getId() ?> </h5>
                <p class="card-text"><?= $task->getText() ?></p>
                <a class="btn btn-primary" href="index.php?action=details&amp;id=<?= $task->getId() ?>">View Task</a>
                <a class="btn btn-warning" href="index.php?action=modify&amp;id=<?= $task->getId() ?>">Modify Task</a>
            </div>
        </div>
    <?php } ?>


</div>


<?php $content = ob_get_clean() ?>

<?php require('view/template.php') ?>