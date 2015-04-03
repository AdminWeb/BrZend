<?php
namespace BrZendTest;

use BrZend\View\Helper\CNPJ;
/**
 * Cnpj test case.
 */
class CNPJTest extends Framework\TestCase
{

    /**
     *
     * @var Cnpj
     */
    private $Cnpj;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->Cnpj = new CNPJ();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->Cnpj = null;
        parent::tearDown();
    }

   

     
    /**
     * @covers BrZend\View\Helper\Cnpj::__invoke
     * @expectedExCnpjtion InvalidArgumentExCnpjtion
     * @expectedExCnpjtionMessage O comprimento do argumento precisa ser de 14 numeros/digitos!
     */
    public function testOnlyExceptionEndNumbersLengthLessthanFourteen(){
        $this->setExpectedException(
            'InvalidArgumentException', 'O comprimento do argumento precisa ser de 14 numeros/digitos!'
        );
        $this->Cnpj->__invoke(12345);
    }
     
    /**
     * @covers BrZend\View\Helper\Cnpj::__invoke
     */
    public function testFormatOutput(){
        $this->assertEquals('060.555.513/0001-90',$this->Cnpj->__invoke(060555513000190));
    }
}

