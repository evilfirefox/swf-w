<?php
/**
 * Created by PhpStorm.
 * User: d.haman
 * Date: 22.10.2015
 * Time: 16:16
 */

namespace Vague\SwfWBundle\Activity;

use Vague\SwfWBundle\Interfaces\WrapperInterface;

class ActivityType implements WrapperInterface
{
    const DEFAULT_VERSION = '1.0';
    const MASK_ACTIVITY_TYPE_ID = '%s-%s';
    const INDEX_ACTIVITY_TYPE = 'activityType';
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
     * @param string $name
     * @param string $version
     */
    function __construct($name, $version = self::DEFAULT_VERSION)
    {
        $this->name = $name;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * @return ActivityType
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivityTypeId()
    {
        return sprintf(static::MASK_ACTIVITY_TYPE_ID, $this->name, $this->version);
    }

    /**
     * @param array $source
     * @return mixed|ActivityType
     */
    public function initFromArray(array $source)
    {
        if (array_key_exists(static::INDEX_ACTIVITY_TYPE, $source)) {
            $source = $source[static::INDEX_ACTIVITY_TYPE];
        }
        $this->name = $source[static::INDEX_NAME];
        $this->version = $source[static::INDEX_VERSION];
        return $this;
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        return array(
            static::INDEX_ACTIVITY_TYPE => array(
                static::INDEX_NAME => $this->name,
                static::INDEX_VERSION => $this->version,
            ),
        );
    }
}