<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 15/11/2015
 * Time: 9:48 PM
 */

namespace Decision;


use Vague\SwfWBundle\Activity\DecisionAttributes\ScheduleActivityTaskDecisionAttributes;
use Vague\SwfWBundle\Decision\Decision;
use Vague\SwfWBundle\Tests\AbstractWrapperTestCase;

class DecisionTest extends AbstractWrapperTestCase
{
    const FILE_FIXTURE = 'decision-mock.json';

    /**
     * @param array $data
     * @dataProvider initFromArrayDataProvider
     */
    public function testInitFromArray(array $data)
    {
        $testObejct = $this->createTestObject();
        $testObejct->initFromArray($data[static::INDEX_INPUT]);
        $this->assertEquals($data[static::INDEX_EXPECTATION], $testObejct);
    }

    /**
     * @return array
     */
    public function initFromArrayDataProvider()
    {
        $fixture = json_decode($this->loadFixture(static::FILE_FIXTURE), true);

        $attributes = new ScheduleActivityTaskDecisionAttributes();
        $attributes->initFromArray($fixture);

        $expectation = new Decision();
        $expectation->setDecisionType('ScheduleActivityTask');
        $expectation->setScheduleActivityTaskDecisionAttributes($attributes);

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
        return new Decision();
    }
}
