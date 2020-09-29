<?php
 
namespace kuihpisang;
 
class solution
{
    var $sudoku = array();
     
   
    function input($input)
    {
        $this->sudoku = $input;
    }
     
    function validate()
    {
        
         
      
        for($row = 0 ; $row <9 ; $row++){
            $bitMap = 0;            
            for($col = 0 ; $col <9 ; $col++){
                if('0' != $this->sudoku[$row][$col]){        
                     
                    $mask = pow(2,$this->sudoku[$row][$col]);                    
                     
                   
                    if(($bitMap & $mask) == 0)
                    {
                        $bitMap = $bitMap | $mask;
                    }
                    else
                    {
                        return false;                       
                    } 
                }
            }
        }       
         
      
        for($col = 0 ; $col <9 ; $col++){
            $bitMap = 0;
            for($row = 0 ; $row <9 ; $row++){
                if('0' != $this->sudoku[$row][$col]){    
                     
                    
                    $mask = pow(2,$this->sudoku[$row][$col]);
                   
                    if(($bitMap & $mask) == 0)
                        $bitMap = $bitMap | $mask;
                    else
                        return false;
                }
            }
        }
         
         
        $xmula = 0;
        $ymula = 0;
       
        for($b = 0 ; $b < 9 ; $b++){
             
            
            $xmula = floor($b /3) * 3;
            $ymula = ($b % 3) * 3;
            $bitMap = 0;            
             
           
            for($x = $xmula ; $x < $xmula + 3 ; $x++){
                
                for($y = $ymula; $y < $ymula + 3 ; $y++){ 
                     
                    if('0' != $this->sudoku[$x][$y]){
                       
                        $mask = pow(2,$this->sudoku[$x][$y]);
                         
                        
                        if(($bitMap & $mask) == 0)
                            $bitMap = $bitMap | $mask;
                        else
                            return false;
                    }
                }
            }
        }
         
       
        return true;
    }
}
 
use \kuihpisang\solution as validateSudoku;
 
$baru = new validateSudoku();
 

$input =  array(
    array(5,3,0,0,7,0,0,0,0), //1
    array(6,0,0,1,9,5,0,0,0), //2
    array(0,9,8,0,0,0,0,6,0), //3
    array(8,0,0,0,6,0,0,0,3), //4
    array(4,0,0,8,0,3,0,0,1), //5 
    array(7,0,0,0,2,0,0,0,6), //6
    array(0,6,0,0,0,0,2,8,0), //7
    array(0,0,0,4,1,9,0,0,5), //8
    array(0,0,0,0,8,0,0,7,9) //9
);
 

$baru->input($input);
 

echo ($baru->validate() ? "true" : "false");
 
?>