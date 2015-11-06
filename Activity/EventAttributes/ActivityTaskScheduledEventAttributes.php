<?php
/**
 * Created by PhpStorm.
 * User: d.haman
 * Date: 23.10.2015
 * Time: 17:16
 */

namespace Vague\SwfWBundle\Activity\EventAttributes;

use Vague\SwfWBundle\Activity\ActivityType;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;
use Vague\SwfWBundle\Workflow\TaskList;

class ActivityTaskScheduledEventAttributes implements WrapperInterface
{
    const INDEX_ACTIVITY_ID = 'activityId';
    const INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES = 'activityTaskScheduledEventAttributes';
    const INDEX_DECISION_TASK_COMPLETED_EVENT_ID = 'decisionTaskCompletedEventId';
    const INDEX_HEARTBEAT_TIMEOUT = 'heartbeatTimeout';
    const INDEX_INPUT = 'input';
    const INDEX_TASK_PRIORITY = 'taskPriority';
    const INDEX_START_TO_CLOSE_TIMEOUT = 'startToCloseTimeout';
    const INDEX_SCHEDULE_TO_START_TIMEOUT = 'scheduleToStartTimeout';
    const INDEX_SCHEDULE_TO_CLOSE_TIMEOUT = 'scheduleToCloseTimeout';

    /**
     * @var string
     */
    protected $activityId;
    /**
     * @var ActivityType
     */
    protected $activityType;
    /**
     * @var string
     */
    protected $heartbeatTimeout;
    /**
     * @var int
     */
    protected $decisionTaskCompletedEventId;
    /**
     * @var string
     */
    protected $input;
    /**
     * @var TaskList
     */
    protected $taskList;
    /**
     * @var int
     */
    protected $taskPriority;
    /**
     * @var string
     */
    protected $startToCloseTimeout;
    /**
     * @var string
     */
    protected $scheduleToStartTimeout;
    /**
     * @var string
     */
    protected $scheduleToCloseTimeout;
    /**
     * @var bool
     */
    protected $isEmpty = true;

    /**
     * @return string
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param string $activityId
     */
    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;
    }

    /**
     * @return ActivityType
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * @param ActivityType $activityType
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;
    }

    /**
     * @return string
     */
    public function getHeartbeatTimeout()
    {
        return $this->heartbeatTimeout;
    }

    /**
     * @param string $heartbeatTimeout
     */
    public function setHeartbeatTimeout($heartbeatTimeout)
    {
        $this->heartbeatTimeout = $heartbeatTimeout;
    }

    /**
     * @return int
     */
    public function getDecisionTaskCompletedEventId()
    {
        return $this->decisionTaskCompletedEventId;
    }

    /**
     * @param int $decisionTaskCompletedEventId
     */
    public function setDecisionTaskCompletedEventId($decisionTaskCompletedEventId)
    {
        $this->decisionTaskCompletedEventId = $decisionTaskCompletedEventId;
    }

    /**
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param string $input
     */
    public function setInput($input)
    {
        $this->input = $input;
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
     * @return string
     */
    public function getScheduleToStartTimeout()
    {
        return $this->scheduleToStartTimeout;
    }

    /**
     * @param string $scheduleToStartTimeout
     */
    public function setScheduleToStartTimeout($scheduleToStartTimeout)
    {
        $this->scheduleToStartTimeout = $scheduleToStartTimeout;
    }

    /**
     * @return string
     */
    public function getScheduleToCloseTimeout()
    {
        return $this->scheduleToCloseTimeout;
    }

    /**
     * @param string $scheduleToCloseTimeout
     */
    public function setScheduleToCloseTimeout($scheduleToCloseTimeout)
    {
        $this->scheduleToCloseTimeout = $scheduleToCloseTimeout;
    }

    /**
     * @return boolean
     */
    public function isIsEmpty()
    {
        return $this->isEmpty;
    }

    /**
     * @param boolean $isEmpty
     */
    public function setIsEmpty($isEmpty = true)
    {
        $this->isEmpty = $isEmpty;
    }

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        if (!array_key_exists(static::INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES, $source)) {
            return;
        }
        $source = $source[static::INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES];
        $this->activityId = $source[static::INDEX_ACTIVITY_ID];
        $this->activityType = new ActivityType();
        $this->activityType->initFromArray($source);
        $this->taskList = new TaskList();
        $this->taskList->initFromArray($source);
        $this->input = $source[static::INDEX_INPUT];
        $this->heartbeatTimeout = $source[static::INDEX_HEARTBEAT_TIMEOUT];
        $this->startToCloseTimeout = $source[static::INDEX_START_TO_CLOSE_TIMEOUT];
        $this->scheduleToStartTimeout = $source[static::INDEX_SCHEDULE_TO_START_TIMEOUT];
        $this->scheduleToCloseTimeout = $source[static::INDEX_SCHEDULE_TO_CLOSE_TIMEOUT];
        $this->taskPriority = $source[static::INDEX_TASK_PRIORITY];
        $this->decisionTaskCompletedEventId = $source[static::INDEX_DECISION_TASK_COMPLETED_EVENT_ID];
        $this->isEmpty = false;
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        if ($this->isEmpty) {
            return array();
        }
        return array(
            static::INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES => array_merge(
                array(
                    static::INDEX_ACTIVITY_ID => $this->activityId,
                    static::INDEX_DECISION_TASK_COMPLETED_EVENT_ID => $this->decisionTaskCompletedEventId,
                    static::INDEX_INPUT => $this->input,
                    static::INDEX_TASK_PRIORITY => $this->taskPriority,
                    static::INDEX_HEARTBEAT_TIMEOUT => $this->heartbeatTimeout,
                    static::INDEX_SCHEDULE_TO_CLOSE_TIMEOUT => $this->scheduleToCloseTimeout,
                    static::INDEX_SCHEDULE_TO_START_TIMEOUT => $this->scheduleToStartTimeout,
                    static::INDEX_START_TO_CLOSE_TIMEOUT => $this->startToCloseTimeout,
                ),
                $this->activityType->convertToArray(),
                $this->taskList->convertToArray()
            ),
        );
    }
}