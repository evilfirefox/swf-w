<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 24/10/2015
 * Time: 11:35 PM
 */

namespace Vague\SwfWBundle\Decision;


use Vague\SwfWBundle\Decision\EventAttributes\ActivityTaskCompletedEventAttributes;
use Vague\SwfWBundle\Decision\EventAttributes\ActivityTaskScheduledEventAttributes;
use Vague\SwfWBundle\Interfaces\WrapperInterface;

class Event implements WrapperInterface
{
    /**
     * @var ActivityTaskCompletedEventAttributes|null
     */
    protected $activityTaskCompletedEventAttributes;
    /**
     * @var ActivityTaskScheduledEventAttributes|null
     */
    protected $activityTaskScheduledEventAttributes;

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