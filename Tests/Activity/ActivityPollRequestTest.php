<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 23/11/2015
 * Time: 12:31 AM
 */

namespace Activity;


use Vague\SwfWBundle\Activity\ActivityPollRequest;
use Vague\SwfWBundle\Tests\AbstractWrapperTestCase;
use Vague\SwfWBundle\Workflow\TaskList;

class ActivityPollRequestTest extends AbstractWrapperTestCase
{
    const FIXTURE_REQUEST_MOCK = 'activity-poll-request-mock.json';

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
        $fixture = json_decode($this->loadFixture(static::FIXTURE_REQUEST_MOCK), true);
        $taskList = new TaskList();
        $taskList->initFromArray($fixture);
        $expectation = new ActivityPollRequest();
        $expectation->setDomain('domainName');
        $expectation->setIdentity('identityValue');
        $expectation->setTaskList($taskList);
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
        $this->assertEquals($data[static::INDEX_EXPECTATION], $result);
    }

    /**
     * @return array
     */
    public function convertToArrayDataProvider()
    {
        $fixture = json_decode($this->loadFixture(static::FIXTURE_REQUEST_MOCK), true);
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $fixture,
                    static::INDEX_EXPECTATION => $fixture,
                ),
            )
        );
    }

    protected function createTestObject()
    {
        return new ActivityPollRequest();
    }
}
