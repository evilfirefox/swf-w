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
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        if (array_key_exists(static::INDEX_EVENTS, $source)) {
            $source = $source[static::INDEX_EVENTS];
        }
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
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
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