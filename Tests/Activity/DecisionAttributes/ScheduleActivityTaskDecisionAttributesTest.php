<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 13/11/2015
 * Time: 12:20 AM
 */

namespace Activity\DecisionAttributes;

use Vague\SwfWBundle\Activity\ActivityType;
use Vague\SwfWBundle\Activity\DecisionAttributes\ScheduleActivityTaskDecisionAttributes;
use Vague\SwfWBundle\Tests\AbstractTestCase;
use Vague\SwfWBundle\Workflow\TaskList;

class ScheduleActivityTaskDecisionAttributesTest extends AbstractTestCase
{
    const FILE_FIXTURE_REQUEST = 'decision-attributes/scheduled-activity-task-decision-attributes-request-mock.json';
    const FILE_FIXTURE_RESPONSE = 'decision-attributes/scheduled-activity-task-decision-attributes-response-mock.json';

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
        $request = json_decode($this->loadFixture(static::FILE_FIXTURE_REQUEST), true);
        $source = $request[ScheduleActivityTaskDecisionAttributes::INDEX_SCHEDULE_ACTIVITY_TASK_DECISION_ATTRIBUTE];
        $expectation = new ScheduleActivityTaskDecisionAttributes();
        $expectation->setActivityId('verification-27');
        $activityType = new ActivityType();
        $activityType->initFromArray($source);
        $expectation->setActivityType($activityType);
        $expectation->setControl('digital music');
        $expectation->setHeartbeatTimeout('120');
        $expectation->setInput('5634-0056-4367-0923,12/12,437');
        $expectation->setScheduleToCloseTimeout('900');
        $expectation->setScheduleToStartTimeout('300');
        $expectation->setStartToCloseTimeout('600');
        $taskList = new TaskList();
        $taskList->initFromArray($source);
        $expectation->setTaskList($taskList);
        $expectation->setTaskPriority('100');
        $expectation->setIsEmpty(false);

        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $request,
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
        $request = json_decode($this->loadFixture(static::FILE_FIXTURE_REQUEST), true);
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $request,
                    static::INDEX_EXPECTATION => $request,
                ),
            ),
        );
    }

    protected function createTestObject()
    {
        return new ScheduleActivityTaskDecisionAttributes();
    }
}
