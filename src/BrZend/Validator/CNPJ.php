<?php
 
namespace BrZend\Validator;
 
use Zend\Validator\AbstractValidator;

class CNPJ extends AbstractValidator {
 
    const LENGTH = 'length';
    const CNPJ = 'CNPJ';
 
    protected $messageTemplates = array(
        self::CNPJ => "'%value%' não é um CNPJ válido.",
        self::LENGTH => "'%value%' precisa ter o tamanho de 15 caracteres sem ponto ou traço",
    );
 
    public function isValid($value) {
        $isValid = true;
        $value = preg_replace("/[^0-9]/", "", $value);
        $this->setValue($value);
        $one = $this->firstDigit($value);
        $two = $this->secondDigit($value);
        $digits = substr($value, -2);
        if (!($digits[0] == $one) && !($digits[1] == $two)) {
            $this->error(self::CNPJ);
            $isValid = false;
        }
        return $isValid;
    }
 
    public function firstDigit($value) {
        $value = preg_replace("/[^0-9]/", "", $value);
        $fatores = array(5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2);
        $prove = substr($value, $value[0] == '0' ? 1 : 0, -2);
        $len = strlen($prove);
        $total = 0;
        for ($i = 0; $i < $len; $i++) {
            $total += $prove[$i] * $fatores[$i];
        }
        $fator = ($total % 11);
        return $fator < 2 ? 0 : 11 - $fator;
    }
 
    public function secondDigit($value) {
        $value = preg_replace("/[^0-9]/", "", $value);
        $fatores = array(6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2);
        $prove = substr($value, $value[0] == '0' ? 1 : 0, -1);
        $len = strlen($prove);
        $total = 0;
        for ($i = 0; $i < $len; $i++) {
            $total += $prove[$i] * $fatores[$i];
        }
        $fator = ($total % 11);
        return $fator < 2 ? 0 : 11 - $fator;
    }
 
}
