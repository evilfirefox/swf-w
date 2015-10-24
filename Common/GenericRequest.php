<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 12:57 AM
 */

namespace Vague\SwfWBundle\Common;

use Vague\SwfWBundle\Interfaces\WrapperInterface;
use Vague\SwfWBundle\Workflow\TaskList;

class GenericRequest implements WrapperInterface
{
    const INDEX_DOMAIN = 'domain';
    const INDEX_IDENTITY = 'identity';

    /**
     * @var string
     */
    protected $domain;
    /**
     * @var string
     */
    protected $identity;
    /**
     * @var TaskList
     */
    protected $taskList;

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
    }

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

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        $this->domain = $source[static::INDEX_DOMAIN];
        $this->identity = $source[static::INDEX_IDENTITY];
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array(
            static::INDEX_DOMAIN => $this->domain,
            static::INDEX_IDENTITY => $this->identity,
        );
    }
}