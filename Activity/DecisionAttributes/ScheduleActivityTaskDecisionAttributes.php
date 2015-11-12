<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 11/11/2015
 * Time: 10:53 PM
 */

namespace Vague\SwfWBundle\Activity\DecisionAttributes;


use Vague\SwfWBundle\Activity\ActivityType;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;
use Vague\SwfWBundle\Workflow\TaskList;

class ScheduleActivityTaskDecisionAttributes implements WrapperInterface
{
    const INDEX_SCHEDULE_ACTIVITY_TASK_DECISION_ATTRIBUTE = 'scheduleActivityTaskDecisionAttributes';
    const INDEX_ACTIVITY_ID = 'activityId';
    const INDEX_CONTROL = 'control';
    const INDEX_HEARTBEAT_TIMEOUT = 'heartbeatTimeout';
    const INDEX_INPUT = 'input';
    const INDEX_SCHEDULE_TO_START_TIMEOUT = 'scheduleToStartTimeout';
    const INDEX_SCHEDULE_TO_CLOSE_TIMEOUT = 'scheduleToCloseTimeout';
    const INDEX_TASK_PRIORITY = 'taskPriority';
    const INDEX_START_TO_CLOSE_TIMEOUT = 'startToCloseTimeout';

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
    protected $control;
    /**
     * @var string
     */
    protected $input;
    /**
     * @var string
     */
    protected $heartbeatTimeout;
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
     * @var TaskList
     */
    protected $taskList;
    /**
     * @var string
     */
    protected $taskPriority;
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
    public function getControl()
    {
        return $this->control;
    }

    /**
     * @param string $control
     */
    public function setControl($control)
    {
        $this->control = $control;
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
     * @param $scheduleToCloseTimeout
     */
    public function setScheduleToCloseTimeout($scheduleToCloseTimeout)
    {
        $this->scheduleToCloseTimeout = $scheduleToCloseTimeout;
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
     * @return string
     */
    public function getTaskPriority()
    {
        return $this->taskPriority;
    }

    /**
     * @param string $taskPriority
     */
    public function setTaskPriority($taskPriority)
    {
        $this->taskPriority = $taskPriority;
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
        if (!array_key_exists(static::INDEX_SCHEDULE_ACTIVITY_TASK_DECISION_ATTRIBUTE, $source)) {
            return;
        }
        $source = $source[static::INDEX_SCHEDULE_ACTIVITY_TASK_DECISION_ATTRIBUTE];
        $this->activityId = $source[static::INDEX_ACTIVITY_ID];
        $this->control = $source[static::INDEX_CONTROL];
        $this->input = $source[static::INDEX_INPUT];
        $this->heartbeatTimeout = $source[static::INDEX_HEARTBEAT_TIMEOUT];
        $this->scheduleToCloseTimeout = $source[static::INDEX_SCHEDULE_TO_CLOSE_TIMEOUT];
        $this->scheduleToStartTimeout = $source[static::INDEX_SCHEDULE_TO_START_TIMEOUT];
        $this->taskPriority = $source[static::INDEX_TASK_PRIORITY];
        $this->startToCloseTimeout = $source[static::INDEX_START_TO_CLOSE_TIMEOUT];
        $this->activityType = new ActivityType();
        $this->activityType->initFromArray($source);
        $this->taskList = new TaskList();
        $this->taskList->initFromArray($source);
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
            static::INDEX_SCHEDULE_ACTIVITY_TASK_DECISION_ATTRIBUTE => array_merge(
                $this->activityType->convertToArray(),
                $this->taskList->convertToArray(),
                array(
                    static::INDEX_TASK_PRIORITY => $this->taskPriority,
                    static::INDEX_HEARTBEAT_TIMEOUT => $this->heartbeatTimeout,
                    static::INDEX_INPUT => $this->input,
                    static::INDEX_SCHEDULE_TO_CLOSE_TIMEOUT => $this->scheduleToCloseTimeout,
                    static::INDEX_SCHEDULE_TO_START_TIMEOUT => $this->scheduleToStartTimeout,
                    static::INDEX_ACTIVITY_ID => $this->activityId,
                    static::INDEX_CONTROL => $this->control,
                    static::INDEX_START_TO_CLOSE_TIMEOUT => $this->startToCloseTimeout,
                )
            ),
        );
    }
}