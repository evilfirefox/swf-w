<?php
/**
 * Created by PhpStorm.
 * User: devastator
 * Date: 24/10/2015
 * Time: 11:40 PM
 */

namespace Vague\SwfWBundle\Decision;


class EventType
{
    const EVENT_WORKFLOW_EXECUTION_STARTED = 'WorkflowExecutionStarted';
    const EVENT_WORKFLOW_EXECUTION_COMPLETED = 'WorkflowExecutionCompleted';
    const EVENT_COMPLETE_WORKFLOW_EXECUTION_FAILED = 'CompleteWorkflowExecutionFailed';
    const EVENT_WORKFLOW_EXECUTION_FAILED = 'WorkflowExecutionFailed';
    const EVENT_ACTIVITY_TASK_STARTED = 'ActivityTaskStarted';
    const EVENT_ACTIVITY_TASK_COMPLETED = 'ActivityTaskCompleted';
    const EVENT_ACTIVITY_TASK_FAILED = 'ActivityTaskFailed';

}