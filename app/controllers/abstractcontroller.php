<?php

namespace PHPMVC\Controllers;

use PHPMVC\lib\FrontController;
//abstract for controllers to set values of controllers actions ...
class AbstractController{

   protected $_controller;
   protected $_action;
   protected $_params;
   protected $_template;
   protected $_language; 

   protected $_data=[];
    public function notFoundAction()
    {
      $this->_view();
    }
    public function setController($controllerName){
        $this->_controller=$controllerName;

    }
    public function setAction($actionName){
        $this->_action=$actionName;

    }
    public function setParams($params){
        $this->_params=$params;

    }
    public function setTemplate($template){
        $this->_template=$template;

    }
    public function setLanguage($language){
        $this->_language=$language;

    }
    protected function _view(){
    
        if($this->_action == FrontController::NOT_FOUND_ACTION){
      require_once  VIEWS_PATH. 'notfound' . DS .'notfound.view.php';
        }else{
            $view =VIEWS_PATH. $this->_controller . DS .$this->_action.'.view.php';
            if(file_exists($view)){ 
            
                  $this->_data= array_merge($this->_data,$this->_language->getDictionary());
                   $this->_template->setActionviewFile($view);
                   $this->_template->setAppData( $this->_data);
                   $this->_template->renderApp();
                  
                
               }else{
                require_once  VIEWS_PATH. 'notfound' . DS .'notview.view.php';
               }
        }
        
    }
}