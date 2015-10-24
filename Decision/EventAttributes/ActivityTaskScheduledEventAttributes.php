<?php
/**
 * Created by PhpStorm.
 * User: d.haman
 * Date: 23.10.2015
 * Time: 17:16
 */

namespace Vague\SwfWBundle\Decision\EventAttributes;


use Vague\SwfWBundle\Activity\ActivityType;
use Vague\SwfWBundle\Interfaces\WrapperInterface;

class ActivityTaskScheduledEventAttributes implements WrapperInterface
{
    const INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES = 'activityTaskScheduledEventAttributes';

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
     * @var integer
     */
    protected $decisionTaskCompletedEventId;
    /**
     * @var string
     */
    protected $heartbeatTimeout;
    /**
     * @var string
     */
    protected $input;

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        if (array_key_exists(static::INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES, $source)) {
            $source = $source[static::INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES];
        }
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        // TODO: Implement convertToArray() method.
    }
}