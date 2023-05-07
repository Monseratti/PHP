<?php
class Controller{
    protected $model, $view;
     function __construct() {
        $this->view = new View();
    }
}
?>