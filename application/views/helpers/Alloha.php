<?php
class Application_View_Helper_Alloha extends Zend_View_Helper_Abstract
{
    public function init()
    {
    }

    public function alloha($param = '')
    {
        if ( ! empty($param)) {
            $alloha = 'Alloha ' . $param . '!';
        } else {
            $alloha = 'Alloha , alloha!';
        }
        return $alloha;
    }

}