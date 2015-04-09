<?php 
namespace BrZendTest;

use BrZend\Validator\CNPJ;
 
class CNPJValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $obj = null;
    public function setUp()
    {
        $this->obj = new CNPJ();
    }
     
    public function tearDown(){
         
    }
    
    /**
     * @covers BrZend\Validator\CNPJ::firstDigit
     */
    public function testFisrtDigit(){
        $this->assertEquals(9,$this->obj->firstDigit('060.555.513/0001-90'));
    }
    /**
     * @covers BrZend\Validator\CNPJ::secondDigit
     */
    public function testSecondDigit(){
        $this->assertEquals(0,$this->obj->secondDigit('060.555.513/0001-90'));
    }
    /**
     * @covers BrZend\Validator\CNPJ::isValid
     */
    public function testIsValid(){
        $this->assertEquals(true,$this->obj->isValid('060.555.513/0001-90'));//012.345.998/9012-38
    }
}