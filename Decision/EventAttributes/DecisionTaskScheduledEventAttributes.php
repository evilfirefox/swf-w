<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 28/10/2015
 * Time: 1:50 AM
 */

namespace Vague\SwfWBundle\Decision\EventAttributes;


use Vague\SwfWBundle\Common\GenericWrapper;
use Vague\SwfWBundle\Workflow\TaskList;

class DecisionTaskScheduledEventAttributes extends GenericWrapper
{
    const INDEX_WRAPPER = 'decisionTaskScheduledEventAttributes';
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
     * @return array
     */
    public function convertToArray()
    {
        if (!$this->isInitialized) {
            return null;
        }
        return array(
            static::INDEX_WRAPPER =>
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