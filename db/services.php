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
        'classpath'   => 'local/todo/external.php',
        'description' => 'Delete a single task by id',
        'type'        => 'write',
        'ajax'        => true,
    ),



 );