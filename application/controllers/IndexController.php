<?php

class IndexController extends Zend_Controller_Action
{

    public function indexAction() { 
        $this->view->id = $this->_getParam('id');
        $this->view->hello = $this->_helper->Hello->prepare("World");
        $this->view->title = "Добро пожаловать";
        $this->view->headTitle($this->view->title);
        $this->view->breadcrumb = array();
        $this->view->breadcrumb['/'] = "Главная";
    }


}

