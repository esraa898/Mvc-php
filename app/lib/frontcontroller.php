<?php

namespace PHPMVC\lib;


class FrontController
{

  const NOT_FOUND_ACTION='notFoundAction';
   const NOT_FOUND_CONTROLLER= 'PHPMVC\Controllers\\NotFoundController';
  private $_controller='index';
  private $_action='default';
  private $_params= [];
 private $_template;
 private $_language;


  public function __construct( Template $template, language $language)
  {
      $this->parseUrl();
      $this->_template =$template;
      $this->_language=$language;
  }
  // prepare path and divde REQUEST URI  into controller ,action ,params.
  private function parseUrl()
   {
       $url=explode('/',trim( parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'),3);
        if(isset($url[0]) && $url[0] != ''){
            $this->_controller =$url[0];
         }
        if(isset($url[1] ) && $url[1] != ''){
            $this->_action =$url[1];
        }
        if(isset($url[2] ) && $url[2] != ''){
            $this->_params = explode('/',$url[2]);
        }
   }

  //  generate the resource of paths (making new insteance of controllers )
   public function dispatch(){
      $controllerClassName='PHPMVC\Controllers\\'.ucfirst($this->_controller).'controller' ;
      $actionName= $this->_action .'Action';
  
      if(!class_exists($controllerClassName)){
        $controllerClassName=self::NOT_FOUND_CONTROLLER ;

      }
      $controller =new $controllerClassName();
      if(!method_exists($controller,$actionName)){
        $this->_action=  $actionName= self::NOT_FOUND_ACTION;
      }
      $controller->setController($this->_controller);
      $controller->setAction($this->_action);
      $controller->setParams($this->_params);
      $controller->setTemplate($this->_template);
      $controller->setLanguage($this->_language);
      $controller->$actionName();


   }
}