<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 18/10/2015
 * Time: 4:05 PM
 */

namespace Vague\SwfWBundle\Interfaces\Client;


interface ClientInterface
{

    /**
     * @param $domain
     * @param $taskList
     * @param null $identity
     * @return mixed
     */
    public function pollForActivityTask($domain, $taskList, $identity = null);

    public function pollForDecisionTask($domain, $taskList);

    public function respondActivityTaskCompleted($result);


}