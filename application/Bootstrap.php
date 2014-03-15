<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public $_view;

    // ------------------------------------------------------------------------
    
    /** Автоподгрузка модулей
     * 
     * @return Zend_Application_Module_Autoloader
     */
    function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath'  => APPLICATION_PATH,
        ));
        return $autoloader;
    }
    
    // ------------------------------------------------------------------------
    
    /** Инициализация единого файла отображения
     * 
     * @return Zend_View
     */
    function _initViewRes() 
    {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');

        $this->bootstrap('view');
        $view = $layout->getView();
        
        $view->doctype('HTML5');
        
        $view->headMeta()
            ->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8')
            ->appendHttpEquiv('X-UA-Compatible', 'IE=edge')
            ->appendName('viewport', 'width=device-width, initial-scale=1');
        
        $view->headTitle('RO Local');
        $view->headTitle()->setSeparator(' - ');
        
        $view->headLink(array('rel' => 'favicon',
                              'href' => '/favicon.ico'),
                              'PREPEND')
            ->appendStylesheet('/jquery/css/cupertino/jquery-ui-1.10.4.custom.css')
            ->appendStylesheet('/bootstrap/dist/css/bootstrap.css')
            ->appendStylesheet('/bootstrap/dist/css/bootstrap-theme.css')
            ->appendStylesheet('/css/tools.css');
        
        $view->headScript()
            ->appendFile('/jquery/js/jquery-1.10.2.js')
            ->appendFile('/jquery/js/jquery-ui-1.10.4.custom.js')
            ->appendFile('/bootstrap/dist/js/bootstrap.js')
            ->appendFile('/js/holder/holder.js')
            ->appendFile('/js/tools.js');
        
        $this->_view = $view;
        return $this->_view;
    }

    // ------------------------------------------------------------------------
    
    /** Инициализация перенаправлений на модули
     *  дополнительно: подключение хелперов действия и хелперов вида
     * 
     * @return Zend_Controller_Router_Rewrite
     */
    protected function _initRouter() {
    
        $front = Zend_Controller_Front::getInstance();
        $router = $front->getRouter();
        $request =  new Zend_Controller_Request_Http();

        $router->addRoute(
            'index',
            new Zend_Controller_Router_Route(
                ':module/:controller/:action/:id', 
                array('id'=>'0')
            )
        );
        
        $router->route($request);
        $this->_view->module     = $request->getModuleName();
        $this->_view->controller = $request->getControllerName();
        $this->_view->action     = $request->getActionName();
        
        $this->_view->addHelperPath(
            APPLICATION_PATH . "/views/helpers", 
            "Application_View_Helper_"
        );
        
        Zend_Controller_Action_HelperBroker::addPath(
            APPLICATION_PATH . '/controllers/helpers', 
            'Application_Controller_Helper_'
        );
        
        Zend_Controller_Action_HelperBroker::addPath(
            APPLICATION_PATH . '/modules/'.$this->_view->module.'/controllers/helpers',
            ucfirst($this->_view->module).'_Controller_Helper_'
        );
        
        Zend_Controller_Action_HelperBroker::addHelper(
            new My_LayoutLoader()
        );
        
        return $router;
    }
    
}

