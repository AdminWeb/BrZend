<?php
namespace BrZendTest;
use BrZend\Validator\CPF;
use \InvalidArgumentException;
use \ReflectionMethod;
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
     * @covers BrZend\Validator\CPF::isValid
     * @expectedException LengthException
     * @expectedExceptionMessage O comprimento do argumento precisa ser de 11 numeros/digitos!
     */
    public function testLengthOfElevenDigits(){
        $this->setExpectedException(
            'LengthException', 'O comprimento do argumento precisa ser de 11 numeros/digitos!'
        );
        $this->CPF->isValid('12345');
    }
    
    /**
     * @covers BrZend\Validator\CPF::isValid
     */
    public function testFalseCPF(){
        $this->assertFalse($this->CPF->isValid('111.424.777-35'));
    }

    /**
     * @covers BrZend\Validator\CPF::isValid
     */
    public function testTrueCPF(){
        $this->assertTrue($this->CPF->isValid('731.888.659-29'));
    }

    /**
     * @covers BrZend\Validator\CPF::getDigitOne
     */
    public function testGetDigitOne()
    {
       
        $this->assertEquals(3,$this->callPrivate($this->CPF,'getDigitOne','111444777'));
    }

    protected function callPrivate($object, $methodName, $arg1 /*, $arg2, ... */)
    {
        if (!is_object($object))
        {
            throw new Exception("{$object} is not an object");
        }

        if (!method_exists($object, $methodName))
        {
            throw new \Exception(get_class($object)." has no method ".$methodName);
        }

        $args = array_slice(func_get_args(), 2);
        $method = new ReflectionMethod($object, $methodName);
        $method->setAccessible(TRUE);

        return $method->invokeArgs($object, $args);
    }

}

