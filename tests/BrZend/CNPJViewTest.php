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
     */
    public function testFormatOutput(){
        $this->assertEquals('060.555.513/0001-90',$this->Cnpj->__invoke(60555513000190));
    }
}

