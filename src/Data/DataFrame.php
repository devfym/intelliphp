<?php

namespace devfym\IntelliPHP\Data;

use devfym\IntelliPHP\Data\Series;

class DataFrame
{
    private $columns;
    private $index;

   public function __construct()
   {
       $this->columns = [];
       $this->index = 0;
   }

   public function readArray($arr = []) : void
   {
       // Set Columns
       $this->columns = array_keys($arr);

       // Set Index
       $this->index = count($arr[$this->columns[0]]);

       // Create Series instance for each column.
       foreach($this->columns as $column) {
           $this->{$column} = new Series();
           $this->{$column}->setList($arr[$column]);
       }
   }

   public function getColumns() : array
   {
        return $this->columns;
   }

   public function getIndex() : int
   {
        return $this->index;
   }

   public function getObjectVariables() : array
   {
       return get_object_vars ($this);
   }
}