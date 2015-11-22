<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 8:44 PM
 */

namespace Vague\SwfWBundle\Activity;


use Vague\SwfWBundle\Common\GenericRequest;
use Vague\SwfWBundle\Workflow\TaskList;

class ActivityPollRequest extends GenericRequest
{
    /**
     * @var TaskList
     */
    protected $taskList;

    /**
     * @return TaskList
     */
    public function getTaskList()
    {
        return $this->taskList;
    }

    /**
     * @param TaskList $taskList
     */
    public function setTaskList($taskList)
    {
        $this->taskList = $taskList;
    }

    public function initFromArray(array $source)
    {
        parent::initFromArray($source);
        $this->taskList = new TaskList();
        $this->taskList->initFromArray($source);
    }

    public function convertToArray()
    {
        return array_merge(
            parent::convertToArray(),
            $this->taskList->convertToArray()
        );
    }
}