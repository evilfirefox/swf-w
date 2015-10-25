<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 25/10/2015
 * Time: 2:03 AM
 */

namespace Vague\SwfWBundle\Tests;


abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    const MASK_PATH = '%s/%s/%s';
    const PATH_FIXTURES = 'fixtures';

    /**
     * @param string $name
     * @return string
     */
    protected function loadFixtures($name)
    {
        $fixturePath = sprintf(static::MASK_PATH, __DIR__, static::PATH_FIXTURES, $name);
        return file_get_contents($fixturePath);
    }
}