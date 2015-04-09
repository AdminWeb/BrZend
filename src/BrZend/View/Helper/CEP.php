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

    public function __invoke($cep)
    {
        if(!is_int($cep)){
            throw new InvalidArgumentException("O argumento precisa ser do tipo inteiro!");
        }
        if(strlen($cep) != 8){
            throw new InvalidArgumentException("O comprimento do argumento precisa ser de 8 numeros/digitos!");
        }
        return substr($cep,0,2).'.'.substr($cep,2,3).'-'.substr($cep,5,3);
    }
}
