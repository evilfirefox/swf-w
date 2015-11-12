<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 08/11/2015
 * Time: 10:57 PM
 */

namespace Vague\SwfWBundle\Decision;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class Decision implements WrapperInterface
{

    protected $decisionType;
    /**
     * @var
     */
    protected $scheduleActivityTaskDecisionAttributes;

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