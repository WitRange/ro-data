<?php

class World_IndexController extends Zend_Controller_Action
{

    public function indexAction() { 
        $this->view->id = $this->_getParam('id');
        $this->view->modhelc = $this->_helper->Modhelc->prepare("World");
        $this->view->hello = $this->_helper->Hello->prepare("World");
        
        $this->view->title = "Карта мира";
        $this->view->headTitle($this->view->title);
        $this->view->breadcrumb = array();
        $this->view->breadcrumb[''] = "Главная";
        $this->view->breadcrumb['world'] = $this->view->title;
    }
    
}
