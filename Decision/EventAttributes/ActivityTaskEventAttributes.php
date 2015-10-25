<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 26/10/2015
 * Time: 12:05 AM
 */

namespace Vague\SwfWBundle\Decision\EventAttributes;


use Vague\SwfWBundle\Activity\ActivityType;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class ActivityTaskEventAttributes implements WrapperInterface
{
    const INDEX_ACTIVITY_ID = '';
    const INDEX_CONTROL = 'control';
    const INDEX_HEARTBEAT_TIMEOUT = 'heartbeatTimeout';

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
    protected $heartbeatTimeout;

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