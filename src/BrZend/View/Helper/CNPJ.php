<?php

namespace BrZend\View\Helper;

use Zend\View\Helper\AbstractHelper;
use \LengthException;

class CNPJ extends AbstractHelper {

    public function __invoke($cnpj) {
        $len = strlen($cnpj);
        $format = '';
        switch ($len) {
            case 14:
                $format = '0' . substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
                break;
            case 15:
                $format = substr($cnpj, 0, 3) . '.' . substr($cnpj, 3, 3) . '.' . substr($cnpj, 6, 3) . '/' . substr($cnpj, 9, 4) . '-' . substr($cnpj, 13, 2);
                break;
            default:
                throw new LengthException("O comprimento do argumento precisa estar entre 14 e 15 números/digitos!");
                break;
        }
        return $format;
    }

}
