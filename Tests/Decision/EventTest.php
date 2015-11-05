<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 30/10/2015
 * Time: 1:21 AM
 */

namespace Decision;


use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskScheduledEventAttributes;
use Vague\SwfWBundle\Decision\Event;
use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskScheduledEventAttributes;
use Vague\SwfWBundle\Tests\AbstractTestCase;
use Vague\SwfWBundle\Workflow\TaskList;

class EventTest extends AbstractTestCase
{
    const FILE_FIXTURE = 'event-history-mock.json';
    const INDEX_TARGET_INDEX = 'targetIndex';

    /**
     * @param array $data
     * @dataProvider initFromArrayDataProvider
     */
    public function testInitFromArray(array $data)
    {
        $testObject = $this->createTestObject();
        $testObject->initFromArray($data[static::INDEX_INPUT][$data[static::INDEX_TARGET_INDEX]]);
        $this->assertEquals($data[static::INDEX_EXPECTATION], $testObject);
    }

    public function initFromArrayDataProvider()
    {
        $data = json_decode($this->loadFixture(static::FILE_FIXTURE), true);
        $expectation = new Event();
        $expectation->setEventTimestamp('2015-10-27T10:57:11+00:00');
        $expectation->setEventType('DecisionTaskScheduled');
        $expectation->setEventId(2);
        $taskList = new TaskList();
        $taskList->setName('pocTasklist');
        $attributes = new DecisionTaskScheduledEventAttributes();
        $attributes->setTaskList($taskList);
        $attributes->setTaskPriority(1);
        $attributes->setStartToCloseTimeout(180);
        $expectation->setDecisionTaskScheduledEventAttributes($attributes);
        $expectation->setActivityTaskScheduledEventAttributes(new ActivityTaskScheduledEventAttributes());
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $data,
                    static::INDEX_EXPECTATION => $expectation,
                    static::INDEX_TARGET_INDEX => 1,
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
        return array(
            array('success' => array(),),
        );
    }

    protected function createTestObject()
    {
        return new Event();
    }
}
