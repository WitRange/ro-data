<?php

class Application_View_Helper_NavbarHorizontal extends Zend_View_Helper_Abstract
{

    /** Zend View
     *
     * @var object - экземпляр Zend_View получаемая автоматически при создании хелпера
     */
    public $view;
    
    /** Links counter
     *
     * @var string - счётчик обработанных ссылок в менюшке
     */
    protected $_count = 0;
    
    /** Depth counter
     *
     * @var string - счётчик глубины вложенности ссылок в менюшке
     */
    protected $_depth = 0;
    
    /** Content of navbar 
     *
     * @var string - контент сформированной менюшки
     */
    protected $_navbar = false;
    
    /** Path to navbar partials folder
     *
     * @var string - путь до папки с шаблонами относительно ./application/layouts/scripts/...
     */
    const NAVBAR_PARTIALS_FOLDER = 'navigation/partials';
    
    /** Автоматическая функция
     *
     * вызывается при создании хелпера
     */
    public function init() {}
    
    /** Автоматическая функция
     *
     * @param object - Zend_Navigation_Container
     *
     * вызывается при создании хелпера
     * получает экземпляр Zend_View
     */
    public function setView(Zend_View_Interface $view) {
        $this->view = $view;
    }

    /**
     * @param object - Zend_Navigation_Container
     */
    public function navbarHorizontal(Zend_Navigation_Container $container, $depth = 0) {
        foreach($container as $page) { 
            if ( ! $page->isVisible()) {
                continue;
            }
            if($this->_count == 0) {
                $this->_partialNavbarHeaderBrand($page);
            }
            $this->_navbarPrepare($page);
            $this->_count++;
        }
        return $this->_navbar;
    }
    
    /**
     * @param object - Zend_Navigation_Page
     */
    protected function _navbarPrepare(Zend_Navigation_Page $page) {
        if ($page->hasPages()) {
            
        }
    }

    /**
     * @param object - Zend_Navigation_Page
     */
    protected function _partialNavbarHeaderBrand(Zend_Navigation_Page $page) {
        $this->_navbar = $this->view->partial(
            self::NAVBAR_PARTIALS_FOLDER . '/navbar-header-brand.phtml', 
            array('page' => $page)
        );
    }

}