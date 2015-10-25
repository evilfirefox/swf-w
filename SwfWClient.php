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
}