<?php
/**
 * @package     local_todo
 * @author      Faisal Abid
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 require_once($CFG->libdir . "/externallib.php");
 require_once($CFG->dirroot . "/local/todo/lib.php");

 class local_todo_external extends external_api{


    public static function delete_task_by_id_parameters(): external_function_parameters{
        return new external_function_parameters(
            array(
                'taskid' => new external_value(PARAM_INT, 'task id'),
            )
        );

    }

    public static function delete_task_by_id(int $taskid): array{
        global $DB;

        $warnings = array();

        local_todo_delete_task($taskid);

        return array(
            'taskid' => $taskid,
            'warnings' => $warnings
        );

    }

    public static function delete_task_by_id_returns(){

        return new external_single_structure(
            array(
                'taskid' => new external_value(PARAM_INT, 'task id'),
                'warnings' => new external_warnings()
            ),
        );

    }


 }