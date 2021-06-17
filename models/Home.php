<?php

class Home
{
    public function showHomeAdmin()
    {
        $homeDir = "homeA.php";
        
        return $homeDir;
    }

    public function showHomeEmpleado()
    {
        $homeDir = "homeB.php";
        
        return $homeDir;
    }
}