<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 08/11/2015
 * Time: 11:21 PM
 */

namespace Vague\SwfWBundle\Activity;


use Symfony\Component\Intl\Exception\NotImplementedException;
use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class ActivityFailureResponse implements WrapperInterface
{
    const INDEX_REASON = 'reason';
    const INDEX_DETAILS = 'details';
    const INDEX_TASK_TOKEN = 'taskToken';

    /**
     * @var string
     */
    protected $taskToken;
    /**
     * @var string
     */
    protected $reason;
    /**
     * @var string
     */
    protected $details;

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
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param string $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source)
    {
        // TODO: Implement initFromArray() method.
        throw new NotImplementedException('initFromArray');
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array(
            static::INDEX_TASK_TOKEN => $this->taskToken,
            static::INDEX_DETAILS => $this->details,
            static::INDEX_REASON => $this->reason,
        );
    }
}