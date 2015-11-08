<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 11:49 AM
 */

namespace Vague\SwfWBundle;


use Aws\Swf\SwfClient;
use Vague\SwfWBundle\Activity\ActivityPollRequest;
use Vague\SwfWBundle\Activity\ActivityTask;
use Vague\SwfWBundle\Activity\ActivityTypesListRequest;
use Vague\SwfWBundle\Decision\Decision;
use Vague\SwfWBundle\Decision\DecisionPollRequest;
use Vague\SwfWBundle\Decision\DecisionTask;
use Vague\SwfWBundle\Workflow\ExecutionHistory;
use Vague\SwfWBundle\Workflow\WorkflowExecutionHistoryRequest;

class SwfWClient
{
    /**
     * @var SwfClient
     */
    protected $swfClient;

    function __construct(SwfClient $client)
    {
        $this->swfClient = $client;
    }

    /**
     * @param ActivityTypesListRequest $request
     */
    public function listActivityTypes(ActivityTypesListRequest $request)
    {
    }

    /**
     * @param WorkflowExecutionHistoryRequest $request
     * @return ExecutionHistory
     */
    public function getWorkflowExecutionHistory(WorkflowExecutionHistoryRequest $request)
    {
    }

    /**
     * @param ActivityPollRequest $request
     * @return ActivityTask
     */
    public function pollForActivityTask(ActivityPollRequest $request)
    {
        $result = new ActivityTask();
        $awsResult = $this->swfClient->pollForActivityTask($request->convertToArray());
        $result->initFromArray($awsResult);
        return $result;
    }

    /**
     * @param DecisionPollRequest $request
     * @return DecisionTask
     */
    public function pollForDecisionTask(DecisionPollRequest $request)
    {
        $result = new DecisionTask();
        $awsResult = $this->swfClient->pollForDecisionTask($request->convertToArray());
        $result->initFromArray($awsResult->toArray());
        return $result;
    }

    /**
     * @param string $taskToken
     * @param string $result
     */
    public function respondActivityTaskCompleted($taskToken, $result = null)
    {
    }

    /**
     * @param string $taskToken
     * @param string|null $reason
     * @param string|null $details
     */
    public function respondActivityTaskFailed($taskToken, $reason = null, $details = null)
    {
    }

    /**
     * @param Decision $request
     */
    public function respondDecisionTaskComplete(Decision $request)
    {
    }
}