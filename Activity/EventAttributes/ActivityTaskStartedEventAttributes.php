<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 30/10/2015
 * Time: 12:35 AM
 */

namespace Vague\SwfWBundle\Activity\EventAttributes;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class ActivityTaskStartedEventAttributes implements WrapperInterface
{
    const INDEX_ACTIVITY_TASK_STARTER_EVENT_ATTRIBUTES = 'activityTaskStartedEventAttributes';
    const INDEX_IDENTITY = 'identity';
    const INDEX_SCHEDULED_EVENT_ID = 'scheduledEventId';

    /**
     * @var string
     */
    protected $identity;
    /**
     * @var int
     */
    protected $scheduledEventId;

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
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
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        if (array_key_exists(static::INDEX_ACTIVITY_TASK_STARTER_EVENT_ATTRIBUTES, $source)) {
            $source = $source[static::INDEX_ACTIVITY_TASK_STARTER_EVENT_ATTRIBUTES];
        }
        $this->identity = $source[static::INDEX_IDENTITY];
        $this->scheduledEventId = $source[static::INDEX_SCHEDULED_EVENT_ID];
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array(
            static::INDEX_ACTIVITY_TASK_STARTER_EVENT_ATTRIBUTES => array(
                static::INDEX_IDENTITY => $this->identity,
                static::INDEX_SCHEDULED_EVENT_ID => $this->scheduledEventId,
            ),
        );
    }
}