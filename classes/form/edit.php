<?php
/**
 * @package     local_todo
 * @author      Faisal Abid
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 //moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");
require_once("$CFG->libdir/moodlelib.php");

class edit extends moodleform {
    public function definition(){

    global $CFG, $DB;

    $mform = $this->_form; // Don't forget the underscore! 

    if(isset($_GET['taskid'])){
        $data = $DB->get_record('local_todo', ['id' => $_GET['taskid']]);
    }
        $mform->addElement('hidden', 'id', get_string('id', 'local_todo'));
        $mform->setType('id', PARAM_INT);
        $mform->setDefault('id', $data->id ?? null);

        $mform->addElement('text', 'title', get_string('title', 'local_todo')); // Add elements to your form.
        $mform->setType('title', PARAM_TEXT);                   // Set type of element.
        $mform->setDefault('title', $data->title ?? "");        // Default value.

        $mform->addElement('textarea', 'description', get_string('description', 'local_todo')); // Add elements to your form.
        $mform->setType('description', PARAM_TEXT);                   // Set type of element.
        $mform->setDefault('description', $data->description ?? "");        // Default value.

        $mform->addElement('date_selector', 'date', get_string('date', 'local_todo')); // Add elements to your form.
        $mform->setType('date', PARAM_INT);                    // Set type of element.
        $mform->setDefault('date', $data->date ?? null);        // Default value.

        $this->add_action_buttons();
    
    }
}