<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 10:28 PM
 */

namespace Vague\SwfWBundle\Decision\EventAttributes;


use Vague\SwfWBundle\Activity\ActivityType;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class ScheduleActivityTaskDecisionEventAttributes extends ActivityTaskEventAttributes
{


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