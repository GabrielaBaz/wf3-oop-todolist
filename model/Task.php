<?php

class Task
{

    private int $_id;
    private string $_text;

    public function __construct(array $data)  //(int $id = 0, string $text)
    {
        //Here we can include the validations on the attributes
        //example, make sure it´s not empty

        $this->_id = (int) $data['id'];
        $this->setText($data['text']);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getText()
    {
        return $this->_text;
    }

    public function setText(string $text)
    {

        if ($text != '') {
            $this->_text = htmlspecialchars($text);
        } else {
            throw new Exception('The text of a task cannot be empty.');
        }
    }
}
