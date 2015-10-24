<?php
/**
 * Created by PhpStorm.
 * User: d.haman
 * Date: 23.10.2015
 * Time: 9:16
 */

namespace Vague\SwfWBundle\Workflow;


use Vague\SwfWBundle\Interfaces\WrapperInterface;

class TaskList implements WrapperInterface
{
    const INDEX_TASK_LIST = 'taskList';
    const INDEX_NAME = 'name';

    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        if (array_key_exists(static::INDEX_TASK_LIST, $source)) {
            $source = $source[static::INDEX_TASK_LIST];
        }
        $this->name = $source[static::INDEX_NAME];
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array(
            static::INDEX_TASK_LIST => array(
                static::INDEX_NAME => $this->name,
            )
        );
    }
}