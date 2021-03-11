<?php

class Manager
{
    protected function dbConnect()
    {
        //We removed the try catch because we have it in the router (index.php). PDO automatically throws and exception so no need to do it
        $db = new PDO('mysql:host=localhost;dbname=new_todolist;charset=utf8', 'root', 'root');

        return $db;
    }
}
