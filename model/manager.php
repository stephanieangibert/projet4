<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=project4;charset=utf8', 'root', '');       
    
    }
}