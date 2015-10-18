<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 18/10/2015
 * Time: 5:21 PM
 */

namespace Vague\SwfWBundle\Interfaces;


interface WrapperInterface
{

    /**
     * @param array $source
     * @return mixed
     */
    public function initFromArray(array $source);
}