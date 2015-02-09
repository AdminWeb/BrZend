<?php
namespace BrZendTest;
use BrZend\View\Helper\CPF;
use \InvalidArgumentException;
/**
 * CPF test case.
 */
class CPFTest extends Framework\TestCase
{

    /**
     *
     * @var CPF
     */
    private $CPF;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
       
        
        $this->CPF = new CPF();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
     
        $this->CPF = null;
        
        parent::tearDown();
    }

   

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O argumento precisa ser do tipo inteiro!
     */
    public function testExceptionWithLetterAndNumber(){
        $this->setExpectedException(
            'InvalidArgumentException', 'O argumento precisa ser do tipo inteiro!'
        );
        $this->CPF->__invoke('12345rt');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O argumento precisa ser do tipo inteiro!
     */
    public function testExceptionIntegerArgument(){
        $this->setExpectedException(
            'InvalidArgumentException', 'O argumento precisa ser do tipo inteiro!'
        );
        $this->CPF->__invoke('12345');
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O comprimento do argumento precisa ser de 8 numeros/digitos!
     */
    public function testOnlyExceptionEndNumbersLengthLessthanEight(){
        $this->setExpectedException(
            'InvalidArgumentException', 'O comprimento do argumento precisa ser de 11 numeros/digitos!'
        );
        $this->CPF->__invoke(12345);
    }
    
    public function testTotalSomaNoveDigitos(){
        $this->assertEquals(162,$this->CPF->__invoke(11144477735,true));
    }
    
    public function testReturnFirstDigit(){
        $this->assertEquals(3,$this->CPF->__invoke(11144477735,false,true));
    }
    public function testReturnSecondDigit(){
        $this->assertEquals(5,$this->CPF->__invoke(11144477735,false,false,true));
    }
    public function testReturnOutput(){
        $this->assertEquals('111.444.777-35',$this->CPF->__invoke(11144477735));
    }

}

