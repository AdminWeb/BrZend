<?php
namespace BrZend\Validator;

use Zend\Validator\AbstractValidator;
use \LengthException;

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
        if (strlen($in) != 11) {
            throw new LengthException("O comprimento do argumento precisa ser de 11 numeros/digitos!");
        }
        $final = explode('-', $value);
        $dig1 = $this->getDigitOne($value);
        $dig2 = $this->getDigitTwo($value);
        $digits = $dig1 . $dig2;
        if ($digits === $final[1]) {
            return true;
        }
        return false;
    }

    protected function getDigitOne($value)
    {
        $total = 0;
        $vef1 = array(
            10,
            9,
            8,
            7,
            6,
            5,
            4,
            3,
            2
        );
        $count = count($vef1);
        $in = (string) $value;
        for ($i = 0; $i < $count; $i ++) {
            $total += $vef1[$i] * $in[$i];
        }
        $vef1 = (($total % 11) < 2) ? 0 : (int) (11 - ($total % 11));
        return $vef1;
    }

    protected function getDigitTwo($value)
    {
        $total = 0;
        $vef2 = array(
            11,
            10,
            9,
            8,
            7,
            6,
            5,
            4,
            3,
            2
        );
        $count = count($vef2);
        $in = (string) $in;
        $total = 0;
        for ($i = 0; $i < $count; $i ++) {
            $total += $vef2[$i] * $in[$i];
        }
        $vef2 = (($total % 11) < 2) ? 0 : (int) (11 - ($total % 11));
        
        return $vef2;
    }
}

?>