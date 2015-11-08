<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 4:35 PM
 */

namespace Vague\SwfWBundle\Workflow;


use Vague\SwfWBundle\Decision\Event;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class ExecutionHistory implements WrapperInterface
{

    /**
     * @var Event[]
     */
    protected $events;
    /**
     * @var string
     */
    protected $nextPageToken;

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