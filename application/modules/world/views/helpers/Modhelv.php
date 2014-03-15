<?php

class World_View_Helper_Modhelv extends Zend_View_Helper_Abstract
{
    public function init() {}

    public function modhelv($param = '') {
        $data = 'приложение/модули/World/виды/хелперы/Modhelv';
        if ( ! empty($param)) {
            $return = $data . '#изменение: ' . $param . '!';
        } else {
            $return = $data . '#стандарт.';
        }
        return $return;
    }

}