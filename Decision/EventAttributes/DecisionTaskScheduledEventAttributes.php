<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 28/10/2015
 * Time: 1:50 AM
 */

namespace Vague\SwfWBundle\Decision\EventAttributes;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;
use Vague\SwfWBundle\Workflow\TaskList;

class DecisionTaskScheduledEventAttributes implements WrapperInterface
{
    const INDEX_DECISION_TASK_SCHEDULED_EVENT_ATTRIBUTES = 'decisionTaskScheduledEventAttributes';
    const INDEX_START_TO_CLOSE_TIMEOUT = 'startToCloseTimeout';
    const INDEX_TASK_PRIORITY = 'taskPriority';

    /**
     * @var string
     */
    protected $startToCloseTimeout;
    /**
     * @var TaskList
     */
    protected $taskList;
    /**
     * @var int
     */
    protected $taskPriority;

    /**
     * @return string
     */
    public function getStartToCloseTimeout()
    {
        return $this->startToCloseTimeout;
    }

    /**
     * @param string $startToCloseTimeout
     */
    public function setStartToCloseTimeout($startToCloseTimeout)
    {
        $this->startToCloseTimeout = $startToCloseTimeout;
    }

    /**
     * @return TaskList
     */
    public function getTaskList()
    {
        return $this->taskList;
    }

    /**
     * @param TaskList $taskList
     */
    public function setTaskList($taskList)
    {
        $this->taskList = $taskList;
    }

    /**
     * @return int
     */
    public function getTaskPriority()
    {
        return $this->taskPriority;
    }

    /**
     * @param int $taskPriority
     */
    public function setTaskPriority($taskPriority)
    {
        $this->taskPriority = $taskPriority;
    }

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        if (array_key_exists(static::INDEX_DECISION_TASK_SCHEDULED_EVENT_ATTRIBUTES, $source)) {
            $source = $source[static::INDEX_DECISION_TASK_SCHEDULED_EVENT_ATTRIBUTES];
        }
        $this->taskList = new TaskList();
        $this->taskList->initFromArray($source);
        $this->taskPriority = $source[static::INDEX_TASK_PRIORITY];
        $this->startToCloseTimeout = $source[static::INDEX_START_TO_CLOSE_TIMEOUT];
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array(
            static::INDEX_DECISION_TASK_SCHEDULED_EVENT_ATTRIBUTES =>
                array_merge(
                    $this->taskList->convertToArray(),
                    array(
                        static::INDEX_START_TO_CLOSE_TIMEOUT => $this->startToCloseTimeout,
                        static::INDEX_TASK_PRIORITY => $this->taskPriority,
                    )
                ),
        );
    }

}