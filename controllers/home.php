<?php

class home
{
    public function index()
    {
        include(baseDir . 'views/header.php');
        include(baseDir.'views/index.php');
        include(baseDir . 'views/footer.php');
    }
}