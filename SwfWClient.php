<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 11:49 AM
 */

namespace Vague\SwfWBundle;


use Aws\Swf\SwfClient;
use Vague\SwfWBundle\Activity\ActivityFailureResponse;
use Vague\SwfWBundle\Activity\ActivityPollRequest;
use Vague\SwfWBundle\Activity\ActivityResultResponse;
use Vague\SwfWBundle\Activity\ActivityTask;
use Vague\SwfWBundle\Activity\ActivityTypesListRequest;
use Vague\SwfWBundle\Decision\Decision;
use Vague\SwfWBundle\Decision\DecisionPollRequest;
use Vague\SwfWBundle\Decision\DecisionTask;
use Vague\SwfWBundle\Exception\NotYetImplementedException;
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
        throw new NotYetImplementedException();
    }

    /**
     * @param WorkflowExecutionHistoryRequest $request
     * @return ExecutionHistory
     */
    public function getWorkflowExecutionHistory(WorkflowExecutionHistoryRequest $request)
    {
        throw new NotYetImplementedException();
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
        $result->initFromArray($awsResult);
        return $result;
    }

    /**
     * @param ActivityResultResponse $request
     */
    public function respondActivityTaskCompleted(ActivityResultResponse $request)
    {
        $this->swfClient->respondActivityTaskCompleted($request->convertToArray());
    }

    /**
     * @param ActivityFailureResponse $request
     */
    public function respondActivityTaskFailed(ActivityFailureResponse $request)
    {
    }

    /**
     * @param Decision $request
     */
    public function respondDecisionTaskComplete(Decision $request)
    {
    }
}