<?php
namespace BrZendTest;
use BrZend\View\Helper\CPF;
use \InvalidArgumentException;
use \LengthException;
/**
 * CPF test case.
 */
class CPFViewTest extends Framework\TestCase
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
     * @covers CPF::__invoke
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
     * @covers CPF::__invoke
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
    * @covers CPF::__invoke
     * @expectedException LengthException
     * @expectedExceptionMessage O comprimento do argumento precisa ser de 11 numeros/digitos!
     */
    public function testOnlyExceptionEndNumbersLengthLessthanEleven(){
        $this->setExpectedException(
            'LengthException', 'O comprimento do argumento precisa ser de 11 numeros/digitos!'
        );
        $this->CPF->__invoke(12345);
    }    
  
    /**
     * @covers CPF::__invoke
     */
    public function testReturnOutput(){
        $this->assertEquals('111.444.777-35',$this->CPF->__invoke(11144477735));
    }

}

