<?php
namespace BrZendTest;
use BrZend\View\Helper\CEP;
/**
 * Cep test case.
 */
class CepTest extends Framework\TestCase
{

    /**
     *
     * @var Cep
     */
    private $Cep;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();        
        $this->Cep = new CEP();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->Cep = null;        
        parent::tearDown();
    }

    /**
     * @covers BrZend\View\Helper\CEP::__invoke
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O argumento precisa ser do tipo inteiro!
     */
    public function testExceptionWithLetterAndNumber(){
        $this->setExpectedException(
            'InvalidArgumentException', 'O argumento precisa ser do tipo inteiro!'
        );
        $this->Cep->__invoke('12345rt');
        $this->Cep->__invoke('12345');
    }
    
       
    /**
     * @covers BrZend\View\Helper\CEP::__invoke
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O comprimento do argumento precisa ser de 8 numeros/digitos!
     */
    public function testOnlyExceptionEndNumbersLengthLessthanEight(){
        $this->setExpectedException(
            'InvalidArgumentException', 'O comprimento do argumento precisa ser de 8 numeros/digitos!'
        );
        $this->Cep->__invoke(12345);
    }
   
    /**
     * @covers BrZend\View\Helper\CEP::__invoke
     */
    public function testFormatOutput(){
        $this->assertEquals('12.345-678',$this->Cep->__invoke(12345678));
    }
}

