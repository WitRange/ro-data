<?php

class Application_Controller_Helper_Hello extends Zend_Controller_Action_Helper_Abstract
{
    public function init() {}
    
    public function prepare($param = '') {
        $data = 'приложение/контроллеры/хелперы/Hello';
        if ( ! empty($param)) {
            $return = $data . '#изменение: ' . $param . '!';
        } else {
            $return = $data . '#стандарт.';
        }
        return $return;
    }

}