<?php

namespace BrZend\View\Helper;

use Zend\View\Helper\AbstractHelper;
use \LengthException;

class CNPJ extends AbstractHelper {

    public function __invoke($cnpj) {
        $len = strlen($cnpj);
        $format = $len == 14? '0' . substr($cnpj, 0, 2) . '.' 
                . substr($cnpj, 2, 3) . '.' 
                . substr($cnpj, 5, 3) . '/' 
                . substr($cnpj, 8, 4) 
                . '-' 
                . substr($cnpj, 12, 2)
                :
            substr($cnpj, 0, 2) . '.' 
                . substr($cnpj, 2, 3) . '.' 
                . substr($cnpj, 5, 3) . '/' 
                . substr($cnpj, 8, 4) 
                . '-' 
                . substr($cnpj, 12, 2)
            ;        
        return $format;
    }

}
