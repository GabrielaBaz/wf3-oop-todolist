<?php

require('Task.php');
require('Manager.php');

class TaskManager extends Manager
{

    // private function dbConnect()
    // {
    //     //We removed the try catch because we have it in the router (index.php). PDO automatically throws and exception so no need to do it
    //     $db = new PDO('mysql:host=localhost;dbname=new_todolist;charset=utf8', 'root', 'root');

    //     return $db;
    // }


    public function getTasks()
    {
        $db = $this->dbConnect();

        $reply = $db->query('SELECT * FROM tasks ORDER BY id DESC');
        $tasks = array();

        while ($row = $reply->fetch()) {
            $tasks[] = new Task($row);
        }

        return $tasks;
    }


    public function getTaskById(Task $task)
    {
        $db = $this->dbConnect();

        if ($this->checkTaskId($task)) {
            $reply = $db->prepare('SELECT * FROM tasks WHERE id=:id');
            $reply->execute(array('id' => $task->getId()));
            $row = $reply->fetch();
            $task->setText($row['text']); //We just set the new text from the query we got with the ID
            return $task; //We return the updated object
        } else {
            throw new Exception('The task id does not exist.');
        }
    }


    public function addTask(Task $task)
    {
        $db = $this->dbConnect();

        $reply = $db->prepare('INSERT INTO tasks(text) VALUES(:myText)');
        return $reply->execute(array('myText' => $task->getText()));
    }


    public function modifyTask(Task $task)
    {
        $db = $this->dbConnect();

        if ($this->checkTaskId($task)) {
            $reply = $db->prepare('UPDATE tasks SET text=:newText WHERE id=:id');
        } else {
            throw new Exception('The task does not exist.');
        }

        return $reply->execute(array(
            'newText' => $task->getText(),
            'id' => $task->getId()
        ));
    }


    private function checkTaskId(Task $task)
    {
        $db = $this->dbConnect();

        $sql = 'SELECT COUNT(*) as n FROM tasks WHERE id=:id';
        $reply = $db->prepare($sql);
        $reply->execute(array('id' => $task->getId()));
        $row = $reply->fetch();

        return $row['n'] > 0;
    }
}
