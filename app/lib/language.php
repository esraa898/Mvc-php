<?php 
namespace PHPMVC\lib;

class language
{
  private $dictinory=[];
    public function load($path){
   
          $defaultLanguage= APP_DEFAULT_LANGUAGE;
          if(isset($_SESSION['lang'])){
            $defaultLanguage=$_SESSION['lang'];
          }
              $pathArray= explode('.',$path);
        $languagefilepath= LANGUAGE_PATH.$defaultLanguage.DS.$pathArray[0].DS.$pathArray[1].'.lang.php';
        
        if (file_exists($languagefilepath)){
            require $languagefilepath;
            if(is_array($_)&& !empty($_)){
                foreach ($_ as $key =>$value){
                   
                     $this->dictinory[$key] = $value;
                   
                }
            
            }
        }
        else{
                    trigger_error('sorry languge file dose\'t exist',E_USER_WARNING);
      }
    }
    public function getDictionary (){
       return $this->dictinory;
    }
}