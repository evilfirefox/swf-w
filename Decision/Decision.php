<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 15/11/2015
 * Time: 9:07 PM
 */

namespace Vague\SwfWBundle\Decision;

use Vague\SwfWBundle\Activity\DecisionAttributes\ScheduleActivityTaskDecisionAttributes;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class Decision implements WrapperInterface
{
    const INDEX_SCHEDULE_ACTIVITY_TASK_DECISION_ATTRIBUTES = 'scheduleActivityTaskDecisionAttributes';
    const INDEX_DECISION_TYPE = 'decisionType';

    /**
     * @var ScheduleActivityTaskDecisionAttributes
     */
    protected $scheduleActivityTaskDecisionAttributes;
    /**
     * @var string
     */
    protected $decisionType;

    /**
     * @return ScheduleActivityTaskDecisionAttributes
     */
    public function getScheduleActivityTaskDecisionAttributes()
    {
        return $this->scheduleActivityTaskDecisionAttributes;
    }

    /**
     * @param ScheduleActivityTaskDecisionAttributes $scheduleActivityTaskDecisionAttributes
     */
    public function setScheduleActivityTaskDecisionAttributes($scheduleActivityTaskDecisionAttributes)
    {
        $this->scheduleActivityTaskDecisionAttributes = $scheduleActivityTaskDecisionAttributes;
    }

    /**
     * @return string
     */
    public function getDecisionType()
    {
        return $this->decisionType;
    }

    /**
     * @param string $decisionType
     */
    public function setDecisionType($decisionType)
    {
        $this->decisionType = $decisionType;
    }

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        $this->scheduleActivityTaskDecisionAttributes = new ScheduleActivityTaskDecisionAttributes();
        $this->scheduleActivityTaskDecisionAttributes->initFromArray($source);
        $this->decisionType = $source[static::INDEX_DECISION_TYPE];
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array_merge(
            array(static::INDEX_DECISION_TYPE => $this->decisionType,),
            $this->scheduleActivityTaskDecisionAttributes->convertToArray()
        );
    }
}