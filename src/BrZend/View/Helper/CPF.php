<?php

/**
 * BrZend\View\Helper
 * @author
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
    public function __invoke($cpf)
    {
        if (!is_int($cpf)) {
            throw new InvalidArgumentException("O argumento precisa ser do tipo inteiro!");
        }
        if (strlen($cpf) != 11) {
            throw new LengthException("O comprimento do argumento precisa ser de 11 numeros/digitos!");
        }
        return substr($cpf,0,3).'.'.substr($cpf,3,3).'.'.substr($cpf,6,3).'-'.substr($cpf,9,2);                
    }
}
