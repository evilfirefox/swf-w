<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 24/10/2015
 * Time: 11:49 PM
 */

namespace Vague\SwfWBundle\Workflow;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

/**
 * Class WorkflowExecution
 * Represents a workflow execution.
 * @package Vague\SwfWBundle\Workflow
 */
class WorkflowExecution implements WrapperInterface
{
    const INDEX_WORKFLOW_EXECUTION = 'workflowExecution';
    const INDEX_RUN_ID = 'runId';
    const INDEX_WORKFLOW_ID = 'workflowId';

    /**
     * A system-generated unique identifier for the workflow execution.
     * @var string
     */
    protected $runId;
    /**
     * The user defined identifier associated with the workflow execution.
     * @var string
     */
    protected $workflowId;
    /**
     * @var bool
     */
    protected $isEmpty = true;

    /**
     * @return string
     */
    public function getRunId()
    {
        return $this->runId;
    }

    /**
     * @param string $runId
     */
    public function setRunId($runId)
    {
        $this->runId = $runId;
    }

    /**
     * @return string
     */
    public function getWorkflowId()
    {
        return $this->workflowId;
    }

    /**
     * @param string $workflowId
     */
    public function setWorkflowId($workflowId)
    {
        $this->workflowId = $workflowId;
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
        if (!array_key_exists(static::INDEX_WORKFLOW_EXECUTION, $source)) {
            return;
        }
        $source = $source[static::INDEX_WORKFLOW_EXECUTION];
        $this->runId = $source[static::INDEX_RUN_ID];
        $this->workflowId = $source[static::INDEX_WORKFLOW_ID];
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
            static::INDEX_WORKFLOW_EXECUTION => array(
                static::INDEX_RUN_ID => $this->runId,
                static::INDEX_WORKFLOW_ID => $this->workflowId,
            )
        );
    }
}