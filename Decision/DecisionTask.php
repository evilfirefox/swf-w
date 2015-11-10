<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 24/10/2015
 * Time: 11:44 PM
 */

namespace Vague\SwfWBundle\Decision;

use Vague\SwfWBundle\Common\GenericTask;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;
use Vague\SwfWBundle\Workflow\WorkflowExecution;
use Vague\SwfWBundle\Workflow\WorkflowType;

class DecisionTask extends GenericTask implements WrapperInterface
{
    const INDEX_EVENTS = 'events';
    const INDEX_PREVIOUS_STARTED_EVENT = 'previousStartedEventId';
    const INDEX_STARTED_EVENT_ID = 'startedEventId';
    const INDEX_TASK_TOKEN = 'taskToken';
    const INDEX_NEXT_PAGE_TOKEN = 'nextPageToken';
    /**
     * @var array
     */
    protected $events;
    /**
     * @var string
     */
    protected $nextPageToken;
    /**
     * @var integer
     */
    protected $previousStartedEventId;
    /**
     * @var WorkflowType
     */
    protected $workflowType;

    //region getters&setters
    /**
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param array $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param string $nextPageToken
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    /**
     * @return int
     */
    public function getPreviousStartedEventId()
    {
        return $this->previousStartedEventId;
    }

    /**
     * @param int $previousStartedEventId
     */
    public function setPreviousStartedEventId($previousStartedEventId)
    {
        $this->previousStartedEventId = $previousStartedEventId;
    }

    /**
     * @return WorkflowType
     */
    public function getWorkflowType()
    {
        return $this->workflowType;
    }

    /**
     * @param WorkflowType $workflowType
     */
    public function setWorkflowType($workflowType)
    {
        $this->workflowType = $workflowType;
    }
    //endregion

    //region WrapperInterface
    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        foreach ($source[static::INDEX_EVENTS] as $e) {
            $event = new Event();
            $event->initFromArray($e);
            $this->events[] = $event;
        }
        $this->workflowExecution = new WorkflowExecution();
        $this->workflowExecution->initFromArray($source);
        $this->workflowType = new WorkflowType();
        $this->workflowType->initFromArray($source);
        $this->taskToken = $source[static::INDEX_TASK_TOKEN];
        $this->nextPageToken = $source[static::INDEX_NEXT_PAGE_TOKEN];
        $this->startedEventId = $source[static::INDEX_STARTED_EVENT_ID];
        $this->previousStartedEventId = $source[static::INDEX_PREVIOUS_STARTED_EVENT];
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        // TODO: Implement convertToArray() method.
    }
    //endregion
}
