<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 30/10/2015
 * Time: 12:45 AM
 */

namespace Activity\EventAttributes;


use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskStartedEventAttributes;
use Vague\SwfWBundle\Tests\AbstractTestCase;

class ActivityTaskStartedEventAttributesTest extends AbstractTestCase
{
    const FILE_FIXTURE_FULL = 'activity-task-started-event-mock.json';
    const FILE_FIXTURE_ATTR = 'activity-task-started-event-attributes-mock.json';

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

    public function initFromArrayDataProvider()
    {
        $dataFull = json_decode($this->loadFixture(static::FILE_FIXTURE_FULL), true);
        $dataAttr = json_decode($this->loadFixture(static::FILE_FIXTURE_ATTR), true);
        $expectation = new ActivityTaskStartedEventAttributes();
        $expectation->setIdentity('562de78681afc');
        $expectation->setScheduledEventId(5);
        $expectation->setIsEmpty(false);
        return array(
            array(
                'success1' => array(
                    static::INDEX_INPUT => $dataFull,
                    static::INDEX_EXPECTATION => $expectation,
                ),
                'success2' => array(
                    static::INDEX_INPUT => $dataAttr,
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

    public function convertToArrayDataProvider()
    {
        $testData = json_decode($this->loadFixture(static::FILE_FIXTURE_ATTR), true);

        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $testData,
                    static::INDEX_EXPECTATION => $testData,
                ),
            ),
        );
    }

    protected function createTestObject()
    {
        return new ActivityTaskStartedEventAttributes();
    }
}
