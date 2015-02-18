<?php
namespace BrZendTest;
use BrZend\Validator\CPF;
use \InvalidArgumentException;

/**
 * CPF test case.
 */
class CPFValidatorTest extends Framework\TestCase
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
     * @expectedException LengthException
     * @expectedExceptionMessage O comprimento do argumento precisa ser de 11 numeros/digitos!
     */
    public function testLengthOfElevenDigits(){
        $this->setExpectedException(
            'LengthException', 'O comprimento do argumento precisa ser de 11 numeros/digitos!'
        );
        $this->CPF->isValid('12345');
    }

}

