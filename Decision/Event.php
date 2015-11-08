<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 24/10/2015
 * Time: 11:35 PM
 */

namespace Vague\SwfWBundle\Decision;

use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskCompletedEventAttributes;
use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskScheduledEventAttributes;
use Vague\SwfWBundle\Activity\EventAttributes\ActivityTaskStartedEventAttributes;
use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskCompletedEventAttributes;
use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskScheduledEventAttributes;
use Vague\SwfWBundle\Decision\EventAttributes\DecisionTaskStartedEventAttributes;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class Event implements WrapperInterface
{
    const INDEX_EVENTS = 'events';
    const INDEX_EVENT_ID = 'eventId';
    const INDEX_EVENT_TIMESTAMP = 'eventTimestamp';
    const INDEX_EVENT_TYPE = 'eventType';

    /**
     * @var ActivityTaskScheduledEventAttributes|null
     */
    protected $activityTaskScheduledEventAttributes;
    /**
     * @var ActivityTaskStartedEventAttributes|null
     */
    protected $activityTaskStartedEventAttributes;
    /**
     * @var ActivityTaskCompletedEventAttributes|null
     */
    protected $activityTaskCompletedEventAttributes;
    /**
     * @var DecisionTaskScheduledEventAttributes
     */
    protected $decisionTaskScheduledEventAttributes;
    /**
     * @var DecisionTaskStartedEventAttributes
     */
    protected $decisionTaskStartedEventAttributes;
    /**
     * @var DecisionTaskCompletedEventAttributes
     */
    protected $decisionTaskCompletedEventAttributes;

    /**
     * @var string
     */
    protected $eventId;
    /**
     * @var string
     */
    protected $eventType;
    /**
     * @var string
     */
    protected $eventTimestamp;
    /**
     * @var bool
     */
    protected $isEmpty = true;

    /**
     * @return null|ActivityTaskScheduledEventAttributes
     */
    public function getActivityTaskScheduledEventAttributes()
    {
        return $this->activityTaskScheduledEventAttributes;
    }

    /**
     * @param null|ActivityTaskScheduledEventAttributes $activityTaskScheduledEventAttributes
     */
    public function setActivityTaskScheduledEventAttributes($activityTaskScheduledEventAttributes)
    {
        $this->activityTaskScheduledEventAttributes = $activityTaskScheduledEventAttributes;
    }

    /**
     * @return null|ActivityTaskStartedEventAttributes
     */
    public function getActivityTaskStartedEventAttributes()
    {
        return $this->activityTaskStartedEventAttributes;
    }

    /**
     * @param null|ActivityTaskStartedEventAttributes $activityTaskStartedEventAttributes
     */
    public function setActivityTaskStartedEventAttributes($activityTaskStartedEventAttributes)
    {
        $this->activityTaskStartedEventAttributes = $activityTaskStartedEventAttributes;
    }

    /**
     * @return null|ActivityTaskCompletedEventAttributes
     */
    public function getActivityTaskCompletedEventAttributes()
    {
        return $this->activityTaskCompletedEventAttributes;
    }

    /**
     * @param null|ActivityTaskCompletedEventAttributes $activityTaskCompletedEventAttributes
     */
    public function setActivityTaskCompletedEventAttributes($activityTaskCompletedEventAttributes)
    {
        $this->activityTaskCompletedEventAttributes = $activityTaskCompletedEventAttributes;
    }

    /**
     * @return DecisionTaskScheduledEventAttributes
     */
    public function getDecisionTaskScheduledEventAttributes()
    {
        return $this->decisionTaskScheduledEventAttributes;
    }

    /**
     * @param DecisionTaskScheduledEventAttributes $decisionTaskScheduledEventAttributes
     */
    public function setDecisionTaskScheduledEventAttributes($decisionTaskScheduledEventAttributes)
    {
        $this->decisionTaskScheduledEventAttributes = $decisionTaskScheduledEventAttributes;
    }

    /**
     * @return DecisionTaskStartedEventAttributes
     */
    public function getDecisionTaskStartedEventAttributes()
    {
        return $this->decisionTaskStartedEventAttributes;
    }

    /**
     * @param DecisionTaskStartedEventAttributes $decisionTaskStartedEventAttributes
     */
    public function setDecisionTaskStartedEventAttributes($decisionTaskStartedEventAttributes)
    {
        $this->decisionTaskStartedEventAttributes = $decisionTaskStartedEventAttributes;
    }

    /**
     * @return DecisionTaskCompletedEventAttributes
     */
    public function getDecisionTaskCompletedEventAttributes()
    {
        return $this->decisionTaskCompletedEventAttributes;
    }

    /**
     * @param DecisionTaskCompletedEventAttributes $decisionTaskCompletedEventAttributes
     */
    public function setDecisionTaskCompletedEventAttributes($decisionTaskCompletedEventAttributes)
    {
        $this->decisionTaskCompletedEventAttributes = $decisionTaskCompletedEventAttributes;
    }

    /**
     * @return string
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param string $eventId
     */
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }

    /**
     * @return string
     */
    public function getEventTimestamp()
    {
        return $this->eventTimestamp;
    }

    /**
     * @param string $eventTimestamp
     */
    public function setEventTimestamp($eventTimestamp)
    {
        $this->eventTimestamp = $eventTimestamp;
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
        $this->activityTaskScheduledEventAttributes = new ActivityTaskScheduledEventAttributes();
        $this->activityTaskScheduledEventAttributes->initFromArray($source);
        $this->activityTaskStartedEventAttributes = new ActivityTaskStartedEventAttributes();
        $this->activityTaskStartedEventAttributes->initFromArray($source);
        $this->activityTaskCompletedEventAttributes = new ActivityTaskCompletedEventAttributes();
        $this->activityTaskCompletedEventAttributes->initFromArray($source);
        $this->decisionTaskScheduledEventAttributes = new DecisionTaskScheduledEventAttributes();
        $this->decisionTaskScheduledEventAttributes->initFromArray($source);
        $this->decisionTaskStartedEventAttributes = new DecisionTaskStartedEventAttributes();
        $this->decisionTaskStartedEventAttributes->initFromArray($source);
        $this->decisionTaskCompletedEventAttributes = new DecisionTaskCompletedEventAttributes();
        $this->decisionTaskCompletedEventAttributes->initFromArray($source);
        $this->eventId = $source[static::INDEX_EVENT_ID];
        $this->eventTimestamp = $source[static::INDEX_EVENT_TIMESTAMP];
        $this->eventType = $source[static::INDEX_EVENT_TYPE];
        $this->isEmpty = false;
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        if ($this->isEmpty) {
            return null;
        }
        $result = array(
            static::INDEX_EVENT_ID => $this->eventId,
            static::INDEX_EVENT_TYPE => $this->eventType,
            static::INDEX_EVENT_TIMESTAMP => $this->eventTimestamp,
        );
        $result = array_merge(
            $result,
            $this->activityTaskScheduledEventAttributes->convertToArray(),
            $this->activityTaskStartedEventAttributes->convertToArray(),
            $this->activityTaskCompletedEventAttributes->convertToArray()
        );
        $result = array_merge(
            $result,
            $this->decisionTaskScheduledEventAttributes->convertToArray(),
            $this->decisionTaskStartedEventAttributes->convertToArray(),
            $this->decisionTaskCompletedEventAttributes->convertToArray()
        );
        return $result;
    }
}