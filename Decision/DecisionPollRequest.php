<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 12:45 AM
 */

namespace Vague\SwfWBundle\Decision;

use Vague\SwfWBundle\Common\GenericRequest;

class DecisionPollRequest extends GenericRequest
{
    const INDEX_MAXIMUM_PAGE_SIZE = 'maximumPageSize';
    const INDEX_NEXT_PAGE_TOKEN = 'nextPageToken';
    const INDEX_REVERSE_ORDER = 'reverseOrder';

    /**
     * @var integer
     */
    protected $maximumPageSize;
    /**
     * @var string
     */
    protected $nextPageToken;
    /**
     * @var boolean
     */
    protected $reverseOrder;

    /**
     * @return int
     */
    public function getMaximumPageSize()
    {
        return $this->maximumPageSize;
    }

    /**
     * @param int $maximumPageSize
     */
    public function setMaximumPageSize($maximumPageSize)
    {
        $this->maximumPageSize = $maximumPageSize;
    }

    /**
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param string $nextPageToken
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }

    /**
     * @return boolean
     */
    public function isReverseOrder()
    {
        return $this->reverseOrder;
    }

    /**
     * @param boolean $reverseOrder
     */
    public function setReverseOrder($reverseOrder)
    {
        $this->reverseOrder = $reverseOrder;
    }

    public function initFromArray(array $source)
    {
        parent::initFromArray($source);
        $this->maximumPageSize = $source[static::INDEX_MAXIMUM_PAGE_SIZE];
        $this->nextPageToken = $source[static::INDEX_NEXT_PAGE_TOKEN];
        $this->reverseOrder = $source[static::INDEX_REVERSE_ORDER];
    }

    public function convertToArray()
    {
        $request = parent::convertToArray();
        return array_merge($request, array(
            static::INDEX_MAXIMUM_PAGE_SIZE => $this->maximumPageSize,
            static::INDEX_NEXT_PAGE_TOKEN => $this->nextPageToken,
            static::INDEX_REVERSE_ORDER => $this->reverseOrder,
        ));
    }
}