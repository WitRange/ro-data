<?php
class Application_Controller_Helper_Hello extends Zend_Controller_Action_Helper_Abstract
{
    public function init()
    {
    }
    
    public function prepare($param = "")
    {
        if ( ! empty($param)) {
            $hello = 'Hello ' . $param . '!';
        } else {
            $hello = 'Hello , hello!';
        }
        return $hello;
    }

}