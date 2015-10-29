<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 28/10/2015
 * Time: 11:09 PM
 */

namespace Vague\SwfWBundle\Tests\Decision\EventAttributes;


use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskScheduledEventAttributes;
use Vague\SwfWBundle\Tests\AbstractTestCase;
use Vague\SwfWBundle\Workflow\TaskList;

class DecisionTaskScheduledEventAttributesTest extends AbstractTestCase
{
    const FILE_FIXTURE_1 = 'decision-task-scheduled-event-mock.json';
    const FILE_FIXTURE_2 = 'decision-task-scheduled-event-attributes-mock.json';

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
        $dataFull = json_decode($this->loadFixture(static::FILE_FIXTURE_1), true);
        $dataAttr = json_decode($this->loadFixture(static::FILE_FIXTURE_2), true);
        $taskList = new TaskList();
        $taskList->setName('pocTasklist');
        $expectation = new DecisionTaskScheduledEventAttributes();
        $expectation->setStartToCloseTimeout(180);
        $expectation->setTaskPriority(1);
        $expectation->setTaskList($taskList);
        return array(
            array(
                'success-full' => array(
                    static::INDEX_INPUT => $dataFull,
                    static::INDEX_EXPECTATION => $expectation,
                ),
                'success-attr' => array(
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
        $dataAttr = json_decode($this->loadFixture(static::FILE_FIXTURE_2), true);
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $dataAttr,
                    static::INDEX_EXPECTATION => $dataAttr,
                ),
            ),
        );
    }

    protected function createTestObject()
    {
        return new DecisionTaskScheduledEventAttributes();
    }
}
