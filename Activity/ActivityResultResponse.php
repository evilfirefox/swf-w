<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 08/11/2015
 * Time: 11:11 PM
 */

namespace Vague\SwfWBundle\Activity;


use Symfony\Component\Intl\Exception\NotImplementedException;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class ActivityResultResponse implements WrapperInterface
{
    const INDEX_RESULT = 'result';
    const INDEX_TASK_TOKEN = 'taskToken';

    /**
     * @var string
     */
    protected $taskToken;
    /**
     * @var string
     */
    protected $result;

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
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        // todo: implement initFromArray method
        throw new NotImplementedException('initFromArray');
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array(
            static::INDEX_RESULT => $this->result,
            static::INDEX_TASK_TOKEN => $this->taskToken,
        );
    }
}