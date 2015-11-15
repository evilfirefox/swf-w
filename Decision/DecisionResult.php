<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 11/11/2015
 * Time: 10:31 PM
 */

namespace Vague\SwfWBundle\Decision;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class DecisionResult implements WrapperInterface
{
    const INDEX_EXECUTION_CONTEXT = 'executionContext';
    const INDEX_DECISIONS = 'decisions';
    const INDEX_TASK_TOKEN = 'taskToken';

    /**
     * @var Decision[]
     */
    protected $decisions;
    /**
     * @var string
     */
    protected $executionContext;
    /**
     * @var string
     */
    protected $taskToken;

    /**
     * @return Decision[]
     */
    public function getDecisions()
    {
        return $this->decisions;
    }

    /**
     * @param Decision[] $decisions
     */
    public function setDecisions($decisions)
    {
        $this->decisions = $decisions;
    }

    /**
     * @return string
     */
    public function getExecutionContext()
    {
        return $this->executionContext;
    }

    /**
     * @param string $executionContext
     */
    public function setExecutionContext($executionContext)
    {
        $this->executionContext = $executionContext;
    }

    /**
     * @return string
     */
    public function getTaskToken()
    {
        return $this->taskToken;
    }

    /**
     * @param string $taskToken
     */
    public function setTaskToken($taskToken)
    {
        $this->taskToken = $taskToken;
    }

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        $this->taskToken = $source[static::INDEX_TASK_TOKEN];
        $this->executionContext = $source[static::INDEX_EXECUTION_CONTEXT];
        $decisions = array();
        foreach ($source[static::INDEX_DECISIONS] as $item) {
            $decision = new Decision();
            $decision->initFromArray($item);
            $decisions[] = $decision;
        }
        $this->decisions = $decisions;
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        /**
         * @var Decision[] $decisions
         */
        $decisions = array();
        foreach ($this->decisions as $decision) {
            $decisions[] = $decision->convertToArray();
        }
        return array(
            static::INDEX_TASK_TOKEN => $this->taskToken,
            static::INDEX_EXECUTION_CONTEXT => $this->executionContext,
            static::INDEX_DECISIONS => $decisions,
        );
    }
}