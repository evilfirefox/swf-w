<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 30/10/2015
 * Time: 12:04 AM
 */

namespace Vague\SwfWBundle\Tests\Decision\EventAttributes;


use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskCompletedEventAttributes;
use Vague\SwfWBundle\Tests\AbstractTestCase;

class DecisionTaskCompletedEventAttributesTest extends AbstractTestCase
{
    const FILE_FIXTURE_COMPLETE = 'decision-task-completed-event-mock.json';
    const FILE_FIXTURE_ATTR = 'decision-task-completed-event-attributes-mock.json';

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
        $dataFull = json_decode($this->loadFixture(static::FILE_FIXTURE_COMPLETE), true);
        $dataAttr = json_decode($this->loadFixture(static::FILE_FIXTURE_ATTR), true);
        $expectation = new DecisionTaskCompletedEventAttributes();
        $expectation->setScheduledEventId(2);
        $expectation->setStartedEventId(3);
        $expectation->setExecutionContext('contextValue');
        $expectation->setIsEmpty(false);
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
        $dataAttr = json_decode($this->loadFixture(static::FILE_FIXTURE_ATTR), true);
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
        return new DecisionTaskCompletedEventAttributes();
    }

}
