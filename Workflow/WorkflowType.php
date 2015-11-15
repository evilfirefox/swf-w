<?php
/**
 * Created by PhpStorm.
 * User: d.haman
 * Date: 23.10.2015
 * Time: 9:20
 */

namespace Vague\SwfWBundle\Workflow;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class WorkflowType implements WrapperInterface
{
    const INDEX_WORKFLOW_TYPE = 'workflowType';
    const INDEX_NAME = 'name';
    const INDEX_VERSION = 'version';

    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $version;
    /**
     * @var bool
     */
    protected $isEmpty = true;

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
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
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
        if (!array_key_exists(static::INDEX_WORKFLOW_TYPE, $source)) {
            return;
        }
        $source = $source[static::INDEX_WORKFLOW_TYPE];
        $this->name = $source[static::INDEX_NAME];
        $this->version = $source[static::INDEX_VERSION];
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
            static::INDEX_WORKFLOW_TYPE => array(
                static::INDEX_NAME => $this->name,
                static::INDEX_VERSION => $this->version,
            ),
        );
    }

}