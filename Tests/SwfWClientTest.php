<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 8:47 PM
 */

namespace Vague\SwfWBundle\Tests;


use Aws\Swf\SwfClient;
use Vague\SwfWBundle\Activity\ActivityFailureResponse;
use Vague\SwfWBundle\Activity\ActivityPollRequest;
use Vague\SwfWBundle\Activity\ActivityResultResponse;
use Vague\SwfWBundle\Activity\ActivityTask;
use Vague\SwfWBundle\Activity\ActivityTypesListRequest;
use Vague\SwfWBundle\Decision\DecisionPollRequest;
use Vague\SwfWBundle\Decision\DecisionTask;
use Vague\SwfWBundle\Decision\Event;
use Vague\SwfWBundle\SwfWClient;
use Vague\SwfWBundle\Workflow\TaskList;
use Vague\SwfWBundle\Workflow\WorkflowExecution;
use Vague\SwfWBundle\Workflow\WorkflowExecutionHistoryRequest;
use Vague\SwfWBundle\Workflow\WorkflowType;

class SwfWClientTest extends AbstractTestCase
{
    const FIXTURE_ACTIVITY_POLL_REQUEST = 'activity-poll-request-mock.json';
    const FIXTURE_ACTIVITY_POLL_RESPONSE = 'activity-poll-response-mock.json';
    const FIXTURE_DECISION_POLL_REQUEST = 'decision-poll-request-mock.json';
    const FIXTURE_DECISION_POLL_RESPONSE = 'decision-poll-response-mock.json';
    const FIXTURE_ACTIVITY_TASK_FAILED_REQUEST = 'activity-task-failed-mock.json';
    const FIXTURE_RESPOND_ACTIVITY_TASK_COMPLETE = 'respond-activity-task-complete-mock.json';
    const EXCEPTION_NOT_IMPLEMENTED = '\Vague\SwfWBundle\Exception\NotYetImplementedException';
    const MESSAGE_EXCEPTION_EXPECTED = 'Exception was expected';

    /**
     * @var SwfClient|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $swfClientMock;

    protected function setUp()
    {
        $this->swfClientMock = $this->getMockBuilder('Aws\Swf\SwfClient')
            ->disableOriginalConstructor()
            ->setMethods(
                array(
                    'pollForActivityTask',
                    'respondActivityTaskCompleted',
                    'pollForDecisionTask',
                    'RespondActivityTaskFailed',
                )
            )
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

    /**
     * @param array $testData
     * @dataProvider pollForDecisionTaskDataProvider
     */
    public function testPollForDecisionTask(array $testData)
    {
        $this->swfClientMock->expects($this->once())
            ->method('pollForDecisionTask')
            ->with($testData[static::INDEX_SWF_CLIENT_REQUEST_MOCK])
            ->will($this->returnValue($testData[static::INDEX_SWF_CLIENT_RESPONSE_MOCK]));

        $testObject = $this->createTestObject();
        $result = $testObject->pollForDecisionTask($testData[static::INDEX_INPUT]);
        $this->assertEquals($testData[static::INDEX_EXPECTATION], $result);
    }

    /**
     *
     */
    public function testListActivityTypes()
    {
        try {
            $this->createTestObject()->listActivityTypes(new ActivityTypesListRequest());
            $this->fail(static::MESSAGE_EXCEPTION_EXPECTED);
        } catch (\Exception $e) {
            $this->assertInstanceOf(static::EXCEPTION_NOT_IMPLEMENTED, $e);
        }
    }

    /**
     *
     */
    public function testGetWorkflowExecutionHistory()
    {
        try {
            $this->createTestObject()->getWorkflowExecutionHistory(new WorkflowExecutionHistoryRequest());
            $this->fail(static::MESSAGE_EXCEPTION_EXPECTED);
        } catch (\Exception $e) {
            $this->assertInstanceOf(static::EXCEPTION_NOT_IMPLEMENTED, $e);
        }
    }

    /**
     * @param array $testData
     * @dataProvider respondActivityTaskFailedDataProvider
     */
    public function testRespondActivityTaskFailed(array $testData)
    {
        $this->swfClientMock->expects($this->once())
            ->method('respondActivityTaskFailed')
            ->with($testData[static::INDEX_SWF_CLIENT_REQUEST_MOCK]);
        $this->createTestObject()->respondActivityTaskFailed($testData[static::INDEX_INPUT]);
    }

    public function respondActivityTaskFailedDataProvider()
    {
        $fixture = json_decode($this->loadFixture(static::FIXTURE_ACTIVITY_TASK_FAILED_REQUEST), true);

        $request = new ActivityFailureResponse();
        $request->setTaskToken('AAAAKgAAAAEAAAAAAAAAAdG7j7YFEl9pfKdXRL3Cy3Q3c');
        $request->setReason('could not verify customer credit card');
        $request->setDetails('card number invalid');

        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $request,
                    static::INDEX_SWF_CLIENT_REQUEST_MOCK => $fixture,
                ),
            ),
        );
    }

    /**
     * @param array $testData
     * @dataProvider respondActivityTaskCompletedDataProvider
     */
    public function testRespondActivityTaskCompleted(array $testData)
    {
        $this->swfClientMock->expects($this->once())
            ->method('respondActivityTaskCompleted')
            ->with($testData[static::INDEX_EXPECTATION]);

        $testObject = $this->createTestObject();
        $testObject->respondActivityTaskCompleted($testData[static::INDEX_INPUT]);
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

    public function respondActivityTaskCompletedDataProvider()
    {
        $input = new ActivityResultResponse();
        $input->setTaskToken('taskToken');
        $input->setResult('resultValue');
        $expectation = json_decode($this->loadFixture(static::FIXTURE_RESPOND_ACTIVITY_TASK_COMPLETE), true);
        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $input,
                    static::INDEX_EXPECTATION => $expectation,
                ),
            ),
        );
    }

    public function pollForDecisionTaskDataProvider()
    {
        $request = json_decode($this->loadFixture(static::FIXTURE_DECISION_POLL_REQUEST), true);
        $response = json_decode($this->loadFixture(static::FIXTURE_DECISION_POLL_RESPONSE), true);

        $taskList = new TaskList();
        $taskList->setName('taskListName');

        $input = new DecisionPollRequest();
        $input->setTaskList($taskList);
        $input->setIdentity('identityValue');
        $input->setDomain('domainName');
        $input->setMaximumPageSize(5);
        $input->setNextPageToken('nextTokenValue');
        $input->setReverseOrder(false);

        $workflowType = new WorkflowType();
        $workflowType->setName('customerOrderWorkflow');
        $workflowType->setVersion('1.0');
        $workflowType->setIsEmpty(false);

        $workflowExecution = new WorkflowExecution();
        $workflowExecution->setRunId('06b8f87a-24b3-40b6-9ceb-9676f28e9493');
        $workflowExecution->setWorkflowId('20110927-T-1');
        $workflowExecution->setIsEmpty(false);

        $events = array();
        foreach ($response[Event::INDEX_EVENTS] as $evt) {
            $event = new Event();
            $event->initFromArray($evt);
            $events[] = $event;
        }

        $expectation = new DecisionTask();
        $expectation->setTaskToken('taskTokenValue');
        $expectation->setNextPageToken('nextPageTokenValue');
        $expectation->setPreviousStartedEventId(0);
        $expectation->setWorkflowType($workflowType);
        $expectation->setWorkflowExecution($workflowExecution);
        $expectation->setStartedEventId(3);
        $expectation->setEvents($events);

        return array(
            array(
                'success' => array(
                    static::INDEX_INPUT => $input,
                    static::INDEX_SWF_CLIENT_REQUEST_MOCK => $request,
                    static::INDEX_SWF_CLIENT_RESPONSE_MOCK => $response,
                    static::INDEX_EXPECTATION => $expectation,
                ),
            )
        );
    }

    protected function createTestObject()
    {
        return new SwfWClient($this->swfClientMock);
    }
}
