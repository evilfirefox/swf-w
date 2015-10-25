<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 7:46 PM
 */

namespace Vague\SwfWBundle\Activity;


use Vague\SwfWBundle\Common\GenericTask;

class ActivityTask extends GenericTask
{
    const INDEX_ACTIVITY_ID = 'activityId';
    const INDEX_INPUT = 'input';

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
    protected $input;

    /**
     * @return string
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param string $activityId
     */
    public function setActivityId($activityId)
    {
        $this->activityId = $activityId;
    }

    /**
     * @return ActivityType
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * @param ActivityType $activityType
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;
    }

    /**
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param string $input
     */
    public function setInput($input)
    {
        $this->input = $input;
    }

    public function initFromArray(array $source)
    {
        parent::initFromArray($source);
        $this->activityId = $source[static::INDEX_ACTIVITY_ID];
        $this->input = $source[static::INDEX_INPUT];
        $this->activityType = new ActivityType();
        $this->activityType->initFromArray($source);
    }

    public function convertToArray()
    {
        $result = array_merge(
            array(
                static::INDEX_ACTIVITY_ID => $this->activityId,
                static::INDEX_INPUT => $this->input,
            ),
            $this->activityType->convertToArray()
        );
        return array_merge(parent::convertToArray(), $result);
    }


}