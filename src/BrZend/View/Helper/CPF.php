<?php
/**
 * BrZend\View\Helper
 * 
 * @author
 * @version 
 */
namespace BrZend\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * View Helper
 */
class CPF extends AbstractHelper
{

    public function __invoke($in)
    {
        $cpf = '';
        if(!is_int($in)){
            throw new InvalidArgumentException("O argumento precisa ser do tipo inteiro!");
        }
        if(strlen($in) != 11){
            throw new InvalidArgumentException("O comprimento do argumento precisa ser de 11 numeros/digitos!");
        }
        return $in;
    }
}
