<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 28/10/2015
 * Time: 12:17 AM
 */

namespace Vague\SwfWBundle\Tests\Activity\EventAttributes;


use Vague\SwfWBundle\Activity\ActivityType;
use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskScheduledEventAttributes;
use Vague\SwfWBundle\Tests\AbstractTestCase;
use Vague\SwfWBundle\Workflow\TaskList;

class ActivityTaskScheduledEventAttributesTest extends AbstractTestCase
{
    const FILE_FIXTURE = 'activity-task-scheduled-event-attributes-mock.json';

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
        $testData = json_decode($this->loadFixture(static::FILE_FIXTURE), true);
        $expectation = new ActivityTaskScheduledEventAttributes();
        $taskList = new TaskList();
        $taskList->setName('pocTasklist');
        $expectation->setTaskList($taskList);
        $expectation->setActivityId('562f5893e3684');
        $activityType = new ActivityType();
        $activityType->setName('convert2Pdf');
        $activityType->setVersion('1.0');
        $expectation->setActivityType($activityType);
        $expectation->setDecisionTaskCompletedEventId(4);
        $expectation->setHeartbeatTimeout('120');
        $expectation->setInput('abc');
        $expectation->setScheduleToCloseTimeout('120');
        $expectation->setScheduleToStartTimeout('120');
        $expectation->setTaskPriority(1);
        $expectation->setStartToCloseTimeout('120');

        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $testData,
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
        $testData = json_decode($this->loadFixture(static::FILE_FIXTURE), true);

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
        return new ActivityTaskScheduledEventAttributes();
    }
}
