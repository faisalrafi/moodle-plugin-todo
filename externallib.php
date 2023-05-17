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

    public static function get_all_task_parameters(): external_function_parameters{
        return new external_function_parameters(
            array()
        );
    }

    public static function get_all_task(): array{
        global $DB;
        $tasks = local_todo_get_all_task();
       
        $todo = [];
        foreach($tasks as $key) {
           array_push($todo,$key);
        }
        
        $result = [];
        $result['taskinfo']=$todo;

        return $result;
    
    }

    public static function get_all_task_returns(){
        return new external_single_structure(
            array(
                'taskinfo' =>new external_multiple_structure(self::get_todo_structure(),'taskinfo',VALUE_OPTIONAL),
            )
        );
    }

    public static function get_todo_structure(){
       return new external_single_structure(
        array(
                'id'          => new external_value(PARAM_RAW, 'id', VALUE_OPTIONAL),
                'title'       => new external_value(PARAM_TEXT, 'title', VALUE_OPTIONAL),
                'description' => new external_value(PARAM_TEXT, 'description', VALUE_OPTIONAL),
                'date'        => new external_value(PARAM_INT, 'date', VALUE_OPTIONAL),
        ),
    );
}

}