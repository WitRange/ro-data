<?php

class World_Controller_Helper_Modhelc extends Zend_Controller_Action_Helper_Abstract
{
    public function init() {}
    
    public function prepare($param = '') {
        $data = 'приложение/модули/World/контроллеры/хелперы/Modhelc';
        if ( ! empty($param)) {
            $return = $data . '#изменение: ' . $param . '!';
        } else {
            $return = $data . '#стандарт.';
        }
        return $return;
    }

}