<?php

/**
 * zf create controller location index-action-include=1 world
 */
class World_LocationController extends Zend_Controller_Action
{
    public $modelWorld;
    
    public function init() {
        $this->modelWorld = new Model_World();
    }

    public function indexAction() { 
        $this->view->id = $this->_getParam('id');
        $this->view->modhelc = $this->_helper->Modhelc->prepare("World");
        $this->view->hello = $this->_helper->Hello->prepare("World");
        
        $this->view->title = "Локация";
        $this->view->headTitle($this->view->title);
        $this->view->breadcrumb = array();
        $this->view->breadcrumb[''] = "Главная";
        $this->view->breadcrumb['world'] = $this->modelWorld->getTitle();
        $this->view->breadcrumb['world/location'] = $this->view->title;
    }
    
    /**
     * zf create action view Location 1 -m world
     */
    public function viewAction() { 
        $this->view->id = $this->_getParam('id');
        $this->view->modhelc = "xxx";//$this->_helper->Modhelc->prepare("World");
        $this->view->hello = $this->_helper->Hello->prepare("World");
        
        $this->view->title = "Локация";
        $this->view->headTitle($this->view->title);
        $this->view->breadcrumb = array();
        $this->view->breadcrumb[''] = "Главная";
        $this->view->breadcrumb['world'] = $this->modelWorld->getTitle();
        $this->view->breadcrumb['world/location'] = $this->view->title;
    }


}

