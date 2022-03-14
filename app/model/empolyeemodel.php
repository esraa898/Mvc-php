<?php
namespace PHPMVC\Model;


class EmpolyeeModel  extends AbstractModel
{
  private $id;
private $first_name;
private $last_name;
private$salary;
private $role;

 protected static $tablename = 'empolyee';

protected static $tableSchema= array(
   

  
     'first_name'=>self::DATA_TYPE_STR,
     'last_name'=>self::DATA_TYPE_STR,
     'salary'=>self::DATA_TYPE_DECIMAL,
     'role'=>self::DATA_TYPE_INT,
 );



 protected static $primaryKey= 'id';


 public function __set($name,$value){
  return $this->$name =$value;
}

public function &__get($prop)
{
   return  $this->$prop;
}


public  function getTableName(){
   return self::$tablename;
}

}
