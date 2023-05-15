<?php
/**
 * @package     local_todo
 * @author      Faisal Abid
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 require_once(__DIR__ . '/../../config.php');
 require_once($CFG->dirroot . '/local/todo/classes/form/edit.php');
 require_once("$CFG->libdir/moodlelib.php");

global $DB;

$PAGE->set_url(new moodle_url('/local/todo/edit.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Edit');

$mform = new edit();

if ($mform->is_cancelled()) 
{
    redirect($CFG->wwwroot . '/local/todo/manage.php', get_string('cancel_form', 'local_todo'));
}
else if($fromform = $mform->get_data()){
    
    $recordtoinsert = new stdClass();
    $recordtoinsert->title = $fromform->title;
    $recordtoinsert->description = $fromform->description;
    $recordtoinsert->date = $fromform->date;

    if($fromform->id != NULL){
        $recordtoinsert->id = $fromform->id;
        $DB->update_record('local_todo', $recordtoinsert);
        redirect($CFG->wwwroot . '/local/todo/manage.php', get_string('updated_task', 'local_todo'));
    }
    else{
        $DB->insert_record('local_todo', $recordtoinsert);
        redirect($CFG->wwwroot . '/local/todo/manage.php', get_string('create_task', 'local_todo'));
    }
}

echo $OUTPUT->header();

$mform->display();

echo $OUTPUT->footer(); 
