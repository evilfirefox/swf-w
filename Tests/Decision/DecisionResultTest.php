<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 15/11/2015
 * Time: 11:55 PM
 */

namespace Vague\SwfWBundle\Tests\Decision;


use Vague\SwfWBundle\Decision\Decision;
use Vague\SwfWBundle\Decision\DecisionResult;
use Vague\SwfWBundle\Tests\AbstractWrapperTestCase;

class DecisionResultTest extends AbstractWrapperTestCase
{
    const FILE_FIXTURE = 'decision-result-mock.json';

    /**
     * @param array $data
     * @dataProvider initFromArrayDataProvider
     */
    public function testInitFromArray(array $data)
    {
        $testObject = $this->createTestObject();
        $testObject->initFromArray($data[static::INDEX_INPUT]);
        $this->assertEquals($data[static::INDEX_EXPECTATION], $testObject);
    }

    /**
     * @return array
     */
    public function initFromArrayDataProvider()
    {
        $fixture = json_decode($this->loadFixture(static::FILE_FIXTURE), true);
        $expectation = new DecisionResult();
        $decision = new Decision();
        $decision->initFromArray($fixture[DecisionResult::INDEX_DECISIONS][0]);
        $expectation->setTaskToken('AAAAKgAAAAEAAAAAAAAAAQLPoqDSLcx4ksNCEQZCyEBqpKhE');
        $expectation->setExecutionContext('Black Friday');
        $expectation->setDecisions(array($decision,));
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $fixture,
                    static::INDEX_EXPECTATION => $expectation,
                ),
            ),
        );
    }

    /**
     * @param array $data
     * @dataProvider convertToArrayDataProvider
     */
    public function testConvertToArray(array $data)
    {
        $testObject = $this->createTestObject();
        $testObject->initFromArray($data[static::INDEX_INPUT]);
        $result = $testObject->convertToArray();
        $this->assertTrue(is_array($result));
        $this->assertEquals($data[static::INDEX_EXPECTATION], $result);
    }

    /**
     * @return array
     */
    public function convertToArrayDataProvider()
    {
        $fixture = json_decode($this->loadFixture(static::FILE_FIXTURE), true);
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $fixture,
                    static::INDEX_EXPECTATION => $fixture,
                ),
            ),
        );
    }

    protected function createTestObject()
    {
        return new DecisionResult();
    }
}
