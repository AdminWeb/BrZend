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
class CPF extends AbstractHelper
{

    public function __invoke($in,$returntotalsoma = false,$returnfirstdigit = false,$returnsecdigit = false)
    {
        $cpf = '';
        $vef1 = array(10,9,8,7,6,5,4,3,2);
        $vef2 = array(11,10,9,8,7,6,5,4,3,2);
        $total = 0;
        if(!is_int($in)){
            throw new InvalidArgumentException("O argumento precisa ser do tipo inteiro!");
        }
        if(strlen($in) != 11){
            throw new InvalidArgumentException("O comprimento do argumento precisa ser de 11 numeros/digitos!");
        }
        $count = count($vef1);
        $in = (string) $in;
        for($i=0;$i<$count;$i++){
            $total += $vef1[$i] * $in[$i];                         
        }
        if($returntotalsoma){
            return $total;
        }
        $vef1 = (($total % 11) < 2) ? 0 : (int) (11 - ($total % 11));
        if($returnfirstdigit){
            return $vef1;
        }
        $in .= $vef1;
        $count = count($vef2);
        $in = (string) $in;
        $total = 0;
        for($i=0;$i<$count;$i++){
            $total += $vef2[$i] * $in[$i];
        }
        $vef2 = (($total % 11) < 2) ? 0 : (int) (11 - ($total % 11));
        if($returnsecdigit){
            return $vef2;
        }
        $in .= $vef2;
        return substr($in,0,3).'.'.substr($in,3,3).'.'.substr($in,6,3).'-'.substr($in,9,2);
        
        
    }
}
