<?php

require('model/TaskManager.php');

function homeT()
{

    $taskManager = new TaskManager();
    $success = NULL;

    if (isset($_POST['myText']) && $_POST['myText'] != '') {
        $task = new Task(array('id' => 0, 'text' => $_POST['myText']));

        if ($taskManager->addTask($task)) {
            $success = 'Y';
        } else {
            $success = 'N';
        }
    }

    $tasks = $taskManager->getTasks();

    require('view/viewHome.php');
}


function detailT()
{

    $taskManager = new TaskManager();

    if (isset($_GET['id'])) {
        //We create an instance of the task class with the empty text, this text is going to be replaced with the real content of the task text in the model function
        //and sent back to the task to show it
        $task = new Task(array('id' => $_GET['id'], 'text' => 'empty'));
        $task = $taskManager->getTaskById($task);
    } else {
        header('Location: index.php');
    }

    require('view/viewTaskDetails.php');
}


function modifyT()
{
    $taskManager = new TaskManager();
    $success = NULL;
    $newTextValue = NULL;

    if (isset($_GET['id']) && $_GET['id'] > 0) {
        //We create an instance of the task class with the empty text
        $task = new Task(array('id' => $_GET['id'], 'text' => 'empty'));
        $task = $taskManager->getTaskById($task);

        if (isset($_POST['newText']) && $_POST['newText'] != '') {
            $task->setText($_POST['newText']);
            if ($taskManager->modifyTask($task)) {
                $success = 1;
                $newTextValue = $task->getText();
            } else {
                $success = 0;
            }
        }
    } else {
        header('Location: index.php');
    }

    require('view/viewUpdate.php');
}
