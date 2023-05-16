<?php
/**
 * @package     local_todo
 * @author      Faisal Abid
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 /**
 * This function delete a single record.
 *
 * @param int|null $id
 * @return void
 * @throws moodle_exception
 */
 function local_todo_delete_task($id) {
    global $DB;
    try {
        $DB->delete_records('local_todo', array('id' => $id));
    } catch (Exception $exception) {
        throw new moodle_exception($exception);
    }
}
