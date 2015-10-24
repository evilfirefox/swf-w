<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 24/10/2015
 * Time: 11:47 PM
 */

namespace Vague\SwfWBundle\Common;


use Vague\SwfWBundle\Workflow\WorkflowExecution;

class GenericTask
{
    /**
     * @var string
     */
    protected $taskToken;
    /**
     * @var integer
     */
    protected $startedEventId;
    /**
     * @var WorkflowExecution
     */
    protected $workflowExecution;

    /**
     * @return int
     */
    public function getStartedEventId()
    {
        return $this->startedEventId;
    }

    /**
     * @param int $startedEventId
     */
    public function setStartedEventId($startedEventId)
    {
        $this->startedEventId = $startedEventId;
    }

    /**
     * @return WorkflowExecution
     */
    public function getWorkflowExecution()
    {
        return $this->workflowExecution;
    }

    /**
     * @param WorkflowExecution $workflowExecution
     */
    public function setWorkflowExecution($workflowExecution)
    {
        $this->workflowExecution = $workflowExecution;
    }

    /**
     * @return string
     */
    public function getTaskToken()
    {
        return $this->taskToken;
    }

    /**
     * @param string $taskToken
     */
    public function setTaskToken($taskToken)
    {
        $this->taskToken = $taskToken;
    }
}