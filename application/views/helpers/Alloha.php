<?php

class Application_View_Helper_Alloha extends Zend_View_Helper_Abstract
{
    public function init() {}

    public function alloha($param = '') {
        $data = 'приложение/виды/хелперы/Alloha';
        if ( ! empty($param)) {
            $return = $data . '#изменение: ' . $param . '!';
        } else {
            $return = $data . '#стандарт.';
        }
        return $return;
    }

}