<?php
namespace BrZendTest;
use BrZend\View\Helper\CPF;

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
        
        // TODO Auto-generated CPFTest::setUp()
        
        $this->CPF = new CPF(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated CPFTest::tearDown()
        $this->CPF = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    /**
     * Tests CPF->__invoke()
     */
    public function test__invoke()
    {
        // TODO Auto-generated CPFTest->test__invoke()
        $this->markTestIncomplete("__invoke test not implemented");
        
        $this->CPF->__invoke(/* parameters */);
    }
}

