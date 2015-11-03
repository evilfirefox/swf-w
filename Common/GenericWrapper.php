<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 02/11/2015
 * Time: 11:51 PM
 */

namespace Vague\SwfWBundle\Common;


use Vague\SwfWBundle\Interfaces\Common\WrapperInterface;

class GenericWrapper implements WrapperInterface
{
    const INDEX_WRAPPER = 'wrapper';
    /**
     * @var bool
     */
    protected $isInitialized = false;

    /**
     * @param array $source
     */
    public function initFromArray(array $source)
    {
        if (!array_key_exists(static::INDEX_WRAPPER, $source)) {
            return null;
        }
        $source = $source[static::INDEX_WRAPPER];
        foreach ($source as $key => $value) {
            if (is_scalar($value)) {
                $this->$key = $value;
                continue;
            }
            $objectName = ucfirst($key);
            $object = new $objectName;
            $object->initFromArray($source);
            $this->$key = $object;
        }
        $this->isInitialized = true;
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        if (!$this->isInitialized) {
            return null;
        }
    }
}