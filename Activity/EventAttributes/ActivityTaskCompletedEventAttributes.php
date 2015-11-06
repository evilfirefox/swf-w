<?php
/**
 * Created by PhpStorm.
 * User: d.haman
 * Date: 23.10.2015
 * Time: 16:19
 */

namespace Vague\SwfWBundle\Activity\EventAttributes;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class ActivityTaskCompletedEventAttributes implements WrapperInterface
{
    const INDEX_ACTIVITY_TASK_COMPLETED_EVENT_ATTRIBUTE = 'activityTaskCompletedEventAttributes';
    const INDEX_RESULT = 'result';
    const INDEX_SCHEDULED_EVENT_ID = 'scheduledEventId';
    const INDEX_STARTED_EVENT_ID = 'startedEventId';

    /**
     * @var string
     */
    protected $result;
    /**
     * @var integer
     */
    protected $scheduledEventId;
    /**
     * @var integer
     */
    protected $startedEventId;
    /**
     * @var bool
     */
    protected $isEmpty = true;

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult($result)
    {
        $this->result = $result;
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
     * @return boolean
     */
    public function isIsEmpty()
    {
        return $this->isEmpty;
    }

    /**
     * @param boolean $isEmpty
     */
    public function setIsEmpty($isEmpty)
    {
        $this->isEmpty = $isEmpty;
    }

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        if (!array_key_exists(static::INDEX_ACTIVITY_TASK_COMPLETED_EVENT_ATTRIBUTE, $source)) {
            return;
        }
        $source = $source[static::INDEX_ACTIVITY_TASK_COMPLETED_EVENT_ATTRIBUTE];
        $this->result = $source[static::INDEX_RESULT];
        $this->scheduledEventId = $source[static::INDEX_SCHEDULED_EVENT_ID];
        $this->startedEventId = $source[static::INDEX_STARTED_EVENT_ID];
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
            static::INDEX_ACTIVITY_TASK_COMPLETED_EVENT_ATTRIBUTE => array(
                static::INDEX_RESULT => $this->result,
                static::INDEX_STARTED_EVENT_ID => $this->startedEventId,
                static::INDEX_SCHEDULED_EVENT_ID => $this->scheduledEventId,
            ),
        );
    }
}