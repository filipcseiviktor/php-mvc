<?php

class Controller
{
    /**
     * To render the actual view file
     * $datas used to pass variables to the actual view file
     */
    protected function render($view,  $datas = [])
    {
        include_once 'app/view/include/header.php';
        include_once 'app/view/' . $view . '.php';
        include_once 'app/view/include/footer.php';
    }
}