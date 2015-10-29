<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 29/10/2015
 * Time: 11:54 PM
 */

namespace Vague\SwfWBundle\Decision\EventAttributes;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class DecisionTaskCompletedEventAttributes implements WrapperInterface
{

    const INDEX_DECISION_TASK_COMPLETED = 'decisionTaskCompletedEventAttributes';
    const INDEX_EXECUTION_CONTEXT = 'executionContext';
    const INDEX_SCHEDULED_EVENT_ID = 'scheduledEventId';
    const INDEX_STARTED_EVENT_ID = 'startedEventId';

    /**
     * @var string
     */
    protected $executionContext;
    /**
     * @var int
     */
    protected $scheduledEventId;
    /**
     * @var int
     */
    protected $startedEventId;

    /**
     * @return string
     */
    public function getExecutionContext()
    {
        return $this->executionContext;
    }

    /**
     * @param string $executionContext
     */
    public function setExecutionContext($executionContext)
    {
        $this->executionContext = $executionContext;
    }

    /**
     * @return int
     */
    public function getScheduledEventId()
    {
        return $this->scheduledEventId;
    }

    /**
     * @param int $scheduledEventId
     */
    public function setScheduledEventId($scheduledEventId)
    {
        $this->scheduledEventId = $scheduledEventId;
    }

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
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        if (array_key_exists(static::INDEX_DECISION_TASK_COMPLETED, $source)) {
            $source = $source[static::INDEX_DECISION_TASK_COMPLETED];
        }
        $this->executionContext = $source[static::INDEX_EXECUTION_CONTEXT];
        $this->startedEventId = $source[static::INDEX_STARTED_EVENT_ID];
        $this->scheduledEventId = $source[static::INDEX_SCHEDULED_EVENT_ID];
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array(
            static::INDEX_DECISION_TASK_COMPLETED => array(
                static::INDEX_EXECUTION_CONTEXT => $this->executionContext,
                static::INDEX_STARTED_EVENT_ID => $this->startedEventId,
                static::INDEX_SCHEDULED_EVENT_ID => $this->scheduledEventId,
            ),
        );
    }
}