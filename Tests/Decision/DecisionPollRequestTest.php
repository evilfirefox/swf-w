<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 1:31 AM
 */

namespace Vague\SwfWBundle\Tests\Decision;


use Vague\SwfWBundle\Decision\DecisionPollRequest;
use Vague\SwfWBundle\Tests\AbstractTestCase;
use Vague\SwfWBundle\Workflow\TaskList;

class DecisionPollRequestTest extends AbstractTestCase
{
    const INDEX_INPUT = 'input';
    const INDEX_EXPECTATION = 'expectation';
    const FIXTURE_DECISION_POLL_REQUEST = 'decision-poll-request-mock.json';

    /**
     * @param array $testData
     * @dataProvider initFromArrayDataProvider
     */
    public function testInitFromArray(array $testData)
    {
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
        $testObject = $this->createTestObject();
        $testObject->initFromArray($testData[static::INDEX_INPUT]);
        $this->assertEquals($testData[static::INDEX_EXPECTATION], $testObject->convertToArray());
    }

    public function initFromArrayDataProvider()
    {
        $data = json_decode($this->loadFixtures(static::FIXTURE_DECISION_POLL_REQUEST), true);
        $expectation = $this->createExpectationObject($data);
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $data,
                    static::INDEX_EXPECTATION => $expectation,
                ),
            ),
        );
    }

    public function convertToArrayDataProvider()
    {
        $data = json_decode($this->loadFixtures(static::FIXTURE_DECISION_POLL_REQUEST), true);
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $data,
                    static::INDEX_EXPECTATION => $data,

                ),
            ),
        );
    }

    /**
     * @param array $data
     * @return DecisionPollRequest
     */
    protected function createExpectationObject($data)
    {
        $expectedTaskList = new TaskList();
        $expectedTaskList->initFromArray($data);
        $expectation = new DecisionPollRequest();
        $expectation->setDomain($data[DecisionPollRequest::INDEX_DOMAIN]);
        $expectation->setIdentity($data[DecisionPollRequest::INDEX_IDENTITY]);
        $expectation->setTaskList($expectedTaskList);
        $expectation->setMaximumPageSize($data[DecisionPollRequest::INDEX_MAXIMUM_PAGE_SIZE]);
        $expectation->setNextPageToken($data[DecisionPollRequest::INDEX_NEXT_PAGE_TOKEN]);
        $expectation->setReverseOrder($data[DecisionPollRequest::INDEX_REVERSE_ORDER]);
        return $expectation;
    }

    /**
     * @return DecisionPollRequest
     */
    protected function createTestObject()
    {
        return new DecisionPollRequest();
    }
}
