<?php

namespace BrZend\View\Helper;

use Zend\View\Helper\AbstractHelper;

class CNPJ extends AbstractHelper {

    public function __invoke($cnpj) {
        $len = strlen($cnpj);
        $format = substr($cnpj, 0, 2) . '.' 
                . substr($cnpj, 2, 3) . '.' 
                . substr($cnpj, 5, 3) . '/' 
                . substr($cnpj, 8, 4) 
                . '-' 
                . substr($cnpj, 12, 2);
        if($len == 14){
            $format = '0'.$format;
        }
        return $format;
    }

}
