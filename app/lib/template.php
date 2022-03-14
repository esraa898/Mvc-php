<?php 

namespace PHPMVC\lib;

class template
{
   private $_templatetparts;
   private $_action_view;
   private $_data;
    public  function __construct(array $parts){

    $this->_templatetparts = $parts;
    }
    public  function setActionViewFile($actionviewpath)
    {

        $this->_action_view = $actionviewpath;
    }

     public  function setAppData($data)
     {

            $this->_data= $data;
    }
   private function  renderTemplateHeaderStart(){
     extract($this->_data);
        require_once  TEMPLATE_PATH.'templateheaderstart.php';
   } 
   private function  renderTemplateHeaderEnd(){
    extract($this->_data);
     require_once  TEMPLATE_PATH.'templateheaderend.php';
   } 
   private function renderTemplateFooter()
    {
     extract($this->_data);
         require_once  TEMPLATE_PATH.'templatefooter.php';
    }
    private function renderTemplateBlocks(){
    
        if(!array_key_exists('template',$this->_templatetparts)){
          trigger_error('sorry you have to define template blocks ',E_USER_WARNING);
        }else{
             $parts= $this->_templatetparts['template'];
            extract($this->_data);
            if(!empty($parts)){ 
              
              foreach($parts as $partkey => $file){
                  
                  if($partkey ===':view'){
                      require_once $this->_action_view;
                  }else{
                      require_once $file;
                  }
              }
          } 
        }
      
     
    }
    private function renderHeaderResources(){
     $output= '';
     if(!array_key_exists('header_resources',$this->_templatetparts)){
         trigger_error('sorry you have to dwfine template header resources',E_USER_WARNING);

     }else{
         $resources= $this->_templatetparts['header_resources'];
        //generate css link 
        $css=$resources['css'];
        if(!empty($css)){
            foreach($css as $csskey =>$path){
           
                    $output .= '<link type="text/css" rel="stylesheet" href ="'.$path.'"/>';
                
            }
        }
     
         echo $output;
    }}
    private function renderfooterResources(){
        $output= '';
        if(!array_key_exists('footer_resources',$this->_templatetparts)){
            trigger_error('sorry you have to dwfine template header resources',E_USER_WARNING);
   
        }else{
            $resources= $this->_templatetparts['footer_resources'];
          
           //generate js links
           $js=$resources['js'];
           if(!empty($js)){
               foreach($js as $jskey =>$path){
              
                       $output .= '<script src="'.$path.'"></script>';
                   
               }
           }
        }
            echo $output;
       }
        public function renderApp(){
       
          $this->renderTemplateHeaderStart();
          $this-> renderHeaderResources();
          $this->renderTemplateHeaderEnd();
          $this->renderTemplateBlocks();
          $this->renderTemplateFooter();
         $this-> renderfooterResources();
    }
    

    
   
} 