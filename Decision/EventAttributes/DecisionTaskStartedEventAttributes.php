<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 28/10/2015
 * Time: 11:37 PM
 */

namespace Vague\SwfWBundle\Decision\EventAttributes;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class DecisionTaskStartedEventAttributes implements WrapperInterface
{
    const INDEX_DECISION_TASK_STARTED = 'decisionTaskStartedEventAttributes';
    const INDEX_SCHEDULED_EVENT_ID = 'scheduledEventId';

    /**
     * @var int
     */
    protected $scheduledEventId;
    /**
     * @var bool
     */
    protected $isEmpty = true;

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
        if (!array_key_exists(static::INDEX_DECISION_TASK_STARTED, $source)) {
            return;
        }
        $source = $source[static::INDEX_DECISION_TASK_STARTED];
        $this->scheduledEventId = $source[static::INDEX_SCHEDULED_EVENT_ID];
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
            static::INDEX_DECISION_TASK_STARTED => array(
                static::INDEX_SCHEDULED_EVENT_ID => $this->scheduledEventId,
            ),
        );
    }
}