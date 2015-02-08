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
/**
 * View Helper
 */
class CEP extends AbstractHelper
{

    public function __invoke($in)
    {
        $cep = '';
        if(!is_int($in)){
            throw new InvalidArgumentException("O argumento precisa ser do tipo inteiro!");
        }
        if(strlen($in) != 8){
            throw new InvalidArgumentException("O comprimento do argumento precisa ser de 8 numeros/digitos!");
        }
        $cel = substr($in,0,2).'.'.substr($in,2,3).'-'.substr($in,5,3);
        return (string) $cel;
    }
}
