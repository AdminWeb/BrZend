<?php
 
namespace BrZend\View\Helper;
 
use Zend\View\Helper\AbstractHelper;
use \LengthException;
 
class CNPJ extends AbstractHelper {
 
    public function __invoke($in) {
        $len = strlen($in);
        $format = '';
        if ($len < 14 || $len > 15) {
            throw new LengthException("O comprimento do argumento precisa estar entre 14 e 15 números/digitos!");
        }
        if ($len == 14) {
            $format = '0'.substr($in, 0, 2) . '.' . substr($in, 2, 3) . '.' . substr($in, 5, 3) . '/' . substr($in, 8, 4) . '-' . substr($in, 12, 2);
        }
        if ($len == 15) {
            $format = substr($in, 0, 3) . '.' . substr($in, 3, 3) . '.' . substr($in, 6, 3) . '/' . substr($in, 9, 4) . '-' . substr($in, 13, 2);
        }
        return $format;
    }
}