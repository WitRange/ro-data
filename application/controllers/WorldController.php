<?php

class WorldController extends Zend_Controller_Action
{

    public function indexAction() { 
        $this->view->title = "Карта мира";
        $this->view->headTitle($this->view->title);
        $this->view->breadcrumb = array();
        $this->view->breadcrumb['/'] = "Главная";
        $this->view->breadcrumb['/world'] = $this->view->title;
    }
    
}
