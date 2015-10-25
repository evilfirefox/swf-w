<?php
/**
 * Created by PhpStorm.
 * User: d.haman
 * Date: 23.10.2015
 * Time: 17:16
 */

namespace Vague\SwfWBundle\Decision\EventAttributes;

class ActivityTaskScheduledEventAttributes extends ActivityTaskEventAttributes
{
    const INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES = 'activityTaskScheduledEventAttributes';
    const INDEX_DECISION_TASK_COMPLETED_EVENT_ID = '';
    const INDEX_INPUT = 'input';

    /**
     * @var integer
     */
    protected $decisionTaskCompletedEventId;

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
        return array(
            static::INDEX_ACTIVITY_TASK_SCHEDULED_EVENT_ATTRIBUTES => array_merge(
                parent::initFromArray($source),
                array(
                    static::INDEX_DECISION_TASK_COMPLETED_EVENT_ID => $this->decisionTaskCompletedEventId,
                    static::INDEX_INPUT => $this->input,
                )
            ),
        );
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        // TODO: Implement convertToArray() method.
    }
}