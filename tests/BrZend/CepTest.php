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
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O argumento precisa ser do tipo inteiro!
     */
    public function testWithLetterAndNumber(){
        $this->assertEquals('sem chance',$this->Cep->__invoke('12345rt'));
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O argumento precisa ser do tipo inteiro!
     */
    public function testOnlyStringNumber(){
        $this->assertEquals('sem chance',$this->Cep->__invoke('12345'));
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O comprimento do argumento precisa ser de 8 numeros/digitos!
     */
    public function testOnlyNumber(){
        $this->assertEquals(12345,$this->Cep->__invoke(12345));
    }
   
    public function testFormat(){
        $this->assertEquals('12.345-678',$this->Cep->__invoke(12345678));
    }
}

