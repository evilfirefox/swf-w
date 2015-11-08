<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 30/10/2015
 * Time: 1:21 AM
 */

namespace Decision;


use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskCompletedEventAttributes;
use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskScheduledEventAttributes;
use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskStartedEventAttributes;
use Vague\SwfWBundle\Decision\Event;
use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskCompletedEventAttributes;
use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskScheduledEventAttributes;
use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskStartedEventAttributes;
use Vague\SwfWBundle\Tests\AbstractTestCase;

class EventTest extends AbstractTestCase
{
    const FILE_FIXTURE_DECISION_SCHEDULED = 'event-history/decision-task-scheduled-mock.json';
    const FILE_FIXTURE_DECISION_STARTED = 'event-history/decision-task-started-mock.json';
    const FILE_FIXTURE_DECISION_COMPLETED = 'event-history/decision-task-completed-mock.json';

    /**
     * @skip
     * @param array $testData
     * @dataProvider initFromArrayDataProvider
     */
    public function testInitFromArray(array $testData)
    {
        $this->markTestSkipped();
        $testObject = $this->createTestObject();
        $testObject->initFromArray($testData[static::INDEX_INPUT]);
        $this->assertEquals($testData[static::INDEX_EXPECTATION], $testObject);
    }

    /**
     * @param array $testData
     * @dataProvider convertToArrayDataProvider
     */
    public function testConvertToArray(array $testData)
    {
        $this->markTestSkipped();
        $testObject = $this->createTestObject();
        $testObject->initFromArray($testData[static::INDEX_INPUT]);
        $result = $testObject->convertToArray();
        $this->assertEquals($testData[static::INDEX_EXPECTATION], $result);
    }

    public function initFromArrayDataProvider()
    {
        $inputDecisionScheduled = json_decode($this->loadFixture(static::FILE_FIXTURE_DECISION_SCHEDULED), true);
        $inputDecisionStarted = json_decode($this->loadFixture(static::FILE_FIXTURE_DECISION_STARTED), true);
        $inputDecisionCompleted = json_decode($this->loadFixture(static::FILE_FIXTURE_DECISION_COMPLETED), true);
        $expectation = new Event();
        $attributesDecisionScheduled = new DecisionTaskScheduledEventAttributes();
        $attributesDecisionScheduled->initFromArray($inputDecisionScheduled);
        $attributesDecisionStarted = new DecisionTaskStartedEventAttributes();
        $attributesDecisionStarted->initFromArray($inputDecisionStarted);

        $expectation->setActivityTaskScheduledEventAttributes(new ActivityTaskScheduledEventAttributes());
        $expectation->setActivityTaskStartedEventAttributes(new ActivityTaskStartedEventAttributes());
        $expectation->setActivityTaskCompletedEventAttributes(new ActivityTaskCompletedEventAttributes());
        $expectation->setDecisionTaskCompletedEventAttributes(new DecisionTaskCompletedEventAttributes());
        $expectation->setDecisionTaskStartedEventAttributes($attributesDecisionStarted);
        $expectation->setDecisionTaskScheduledEventAttributes($attributesDecisionScheduled);
        $expectation->setEventId(2);
        $expectation->setEventTimestamp('2015-10-27T10:57:11+00:00');
        $expectation->setEventType('DecisionTaskScheduled');
        $expectation->setIsEmpty(false);
        return array(
            array(
                'decision-task-scheduled-mock' => array(
                    static::INDEX_INPUT => $inputDecisionScheduled,
                    static::INDEX_EXPECTATION => $expectation,
                ),
                'decision-task-started-mock' => array(
                    static::INDEX_INPUT => $inputDecisionStarted,
                    static::INDEX_EXPECTATION => $expectation,
                ),
            ),
        );
    }

    public function convertToArrayDataProvider()
    {
        $inputDecisionScheduled = json_decode($this->loadFixture(static::FILE_FIXTURE_DECISION_SCHEDULED), true);
        return array(
            array(
                'decision-task-scheduled-mock' => array(
                    static::INDEX_INPUT => $inputDecisionScheduled,
                    static::INDEX_EXPECTATION => $inputDecisionScheduled,
                ),
            ),
        );
    }

    protected function createTestObject()
    {
        return new Event();
    }
}
