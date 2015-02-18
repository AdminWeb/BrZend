<?php
namespace BrZend\Validator;

use Zend\Validator\AbstractValidator;

/**
 *
 * @author igor
 *        
 */
class CPF extends AbstractValidator
{

  
    /**
     * (non-PHPdoc)
     *
     * @see \Zend\Validator\ValidatorInterface::isValid()
     *
     */
    public function isValid($value)
    {
        $cpf = '';
        $vef1 = array(10,9,8,7,6,5,4,3,2);
        $vef2 = array(11,10,9,8,7,6,5,4,3,2);
        $total = 0;
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
    }
}

?>