<?php
/**
 * BrZend\View\Helper
 * 
 * @authorn
 * @version 
 */
namespace BrZend\View\Helper;

use Zend\View\Helper\AbstractHelper;
use \InvalidArgumentException;
use \LengthException;
/**
 * View Helper
 */
class CPF extends AbstractHelper
{

    public function __invoke($in)
    {
        if(!is_int($in)){
            throw new InvalidArgumentException("O argumento precisa ser do tipo inteiro!");
        }
        if(strlen($in) != 11){
            throw new LengthException("O comprimento do argumento precisa ser de 11 numeros/digitos!");
        }       
        return substr($in,0,3).'.'.substr($in,3,3).'.'.substr($in,6,3).'-'.substr($in,9,2);                
    }
}
