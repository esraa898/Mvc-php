<?php
namespace PHPMVC\Controllers;

use PHPMVC\lib\Helper;
use PHPMVC\lib\InputFilter;
use PHPMVC\Model\EmpolyeeModel;

class EmpolyeeController extends AbstractController{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
         $this->_language->load('template.common');
        $this->_language->load('empolyee.default');
       
        $this->_data['empolyees']= EmpolyeeModel::getAll();
  
        $this->_view();
    } 

public function addAction()
{ 
    $this->_language->load('template.common');
    $this->_language->load('empolyee.default');
    if(isset($_POST['submit'])){
        $emp = new EmpolyeeModel() ;
        $emp->first_name = $this->filterString($_POST['firstN']);
        $emp->last_name = $this->filterString($_POST['lastN']);
        $emp->salary= $this->filterFloat($_POST['Salary']);
        $emp->role =$this->filterInt( $_POST['role']);
       if($emp->save()){
           $this->redirect("/empolyee");
       } ;
     
    }
    $this->_view();
} 

public function editAction()
{
    $this->_language->load('template.common');
    $this->_language->load('empolyee.default');
    $id= $this->filterInt($this->_params[0]);
   
    
    $emp= EmpolyeeModel::getByPK($id);
 
      if($emp === false){
           $this->redirect("/empolyee");
   }
     $this->_data['empolyee']=$emp;
    if(isset($_POST['submit'])){
        $emp->first_name = $this->filterString($_POST['firstN']);
        $emp->last_name = $this->filterString($_POST['lastN']);
        $emp->salary= $this->filterFloat($_POST['Salary']);
        $emp->role =$this->filterInt( $_POST['role']);
       if($emp->save()){
        $_SESSION['message']= 'empolyee saved suesscefully ';
          $this->redirect("/empolyee");
       } 
       
    }
    $this->_view();
} 

public function deleteAction()
{
    $id= $this->filterInt($this->_params[0]);
    
    $emp= EmpolyeeModel::getByPK($id);
   
      if($emp === false){
           $this->redirect("/empolyee");
   }
       if($emp->delete()){
        $_SESSION['message']= 'empolyee deleted suesscefully ';
          $this->redirect("/empolyee");
       } ;
       
    }
 
} 


