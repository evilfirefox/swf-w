<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 15/11/2015
 * Time: 9:59 PM
 */

namespace Vague\SwfWBundle\Tests;


interface WrapperInterfaceTest
{
    /**
     * @param array $data
     * @dataProvider initFromArrayDataProvider
     */
    public function testInitFromArray(array $data);

    /**
     * @return array
     */
    public function initFromArrayDataProvider();

    /**
     * @param array $data
     * @dataProvider convertToArrayDataProvider
     */
    public function testConvertToArray(array $data);

    /**
     * @return array
     */
    public function convertToArrayDataProvider();
}