<?php

class Admin_IndexController extends Zend_Controller_Action
{

    public function init() {}

    public function indexAction() {
        $modelAdministrator = new Admin_Model_Administrator();
        $this->view->title = $modelAdministrator->getTitle();
        $this->view->headTitle($this->view->title);
        $this->view->breadcrumb = array();
        $this->view->breadcrumb[''] = "Главная";
    }

}

