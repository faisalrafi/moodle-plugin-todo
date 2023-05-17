<?php
/**
 * @package     local_todo
 * @author      Faisal Abid
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 $functions = array(
    'local_todo_delete_task_by_id' => array(
        'classname'   => 'local_todo_external',
        'methodname'  => 'delete_task_by_id',
        'classpath'   => 'local/todo/externallib.php',
        'description' => 'Delete a single task by id',
        'type'        => 'write',
        'ajax'        => true,
        'services'    => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
    ),
    'local_todo_get_all_task' => array(
        'classname'   => 'local_todo_external',
        'methodname'  => 'get_all_task',
        'classpath'   => 'local/todo/externallib.php',
        'description' => 'Get All Task Details',
        'type'        => 'write',
        'ajax'        => true,
        'services'    => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
    ),
    
);