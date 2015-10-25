<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 8:47 PM
 */

namespace Vague\SwfWBundle\Tests;


use Aws\Swf\SwfClient;
use Vague\SwfWBundle\Activity\ActivityPollRequest;
use Vague\SwfWBundle\Activity\ActivityTask;
use Vague\SwfWBundle\SwfWClient;

class SwfWClientTest extends AbstractTestCase
{
    const FIXTURE_ACTIVITY_POLL_REQUEST = 'activity-poll-request-mock.json';
    const FIXTURE_ACTIVITY_POLL_RESPONSE = 'activity-poll-response-mock.json';

    /**
     * @var SwfClient|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $swfClientMock;

    protected function setUp()
    {
        $this->swfClientMock = $this->getMockBuilder('Aws\Swf\SwfClient')
            ->disableOriginalConstructor()
            ->setMethods(array('pollForActivityTask',))
            ->getMock();
    }

    /**
     * @param array $testData
     * @dataProvider pollForActivityTaskDataProvider
     */
    public function testPollForActivityTask(array $testData)
    {
        $this->swfClientMock->expects($this->once())
            ->method('pollForActivityTask')
            ->with($testData[static::INDEX_SWF_CLIENT_REQUEST_MOCK])
            ->will($this->returnValue($testData[static::INDEX_SWF_CLIENT_RESPONSE_MOCK]));
        $testObject = $this->createTestObject();
        $result = $testObject->pollForActivityTask($testData[static::INDEX_INPUT]);
        $this->assertEquals($testData[static::INDEX_EXPECTATION], $result);
    }

    public function pollForActivityTaskDataProvider()
    {
        $inputFixture = json_decode($this->loadFixture(static::FIXTURE_ACTIVITY_POLL_REQUEST), true);
        $input = new ActivityPollRequest();
        $input->initFromArray($inputFixture);

        $mockExpectationFixture = json_decode($this->loadFixture(static::FIXTURE_ACTIVITY_POLL_RESPONSE), true);

        $expectation = new ActivityTask();
        $expectation->initFromArray($mockExpectationFixture);

        return array(
            array(
                'success' => array(
                    static::INDEX_SWF_CLIENT_REQUEST_MOCK => $inputFixture,
                    static::INDEX_INPUT => $input,
                    static::INDEX_SWF_CLIENT_RESPONSE_MOCK => $mockExpectationFixture,
                    static::INDEX_EXPECTATION => $expectation,
                ),
            ),
        );
    }

    protected function createTestObject()
    {
        return new SwfWClient($this->swfClientMock);
    }
}
