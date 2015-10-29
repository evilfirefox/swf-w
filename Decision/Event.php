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
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        // TODO: Implement initFromArray() method.
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        // TODO: Implement convertToArray() method.
    }
}