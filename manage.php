<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin manage page.
 *
 * @package    local_todo
 * @copyright  2023 Faisal Abid
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 

 require_once(__DIR__.'/../../config.php');
 require_once('./lib.php');
//  require_once($CFG->dirroot . '/local/todo/classes/form/edit.php');

 global $DB;

 $PAGE->set_url(new moodle_url('/local/todo/manage.php'));
 $PAGE->set_context(\context_system::instance());
 $PAGE->set_title(get_string('manage_tasks','local_todo'));


 $tasks = $DB->get_records('local_todo', null, 'id');
 echo $OUTPUT->header();
 

$templatecontext = (object)[
    'tasks' => array_values($tasks),
    'editurl' => new moodle_url('/local/todo/edit.php'),
];

echo $OUTPUT->render_from_template('local_todo/manage', $templatecontext);
 
$PAGE->requires->js_call_amd('local_todo/confirmdelete', 'init', array());

echo $OUTPUT->footer();

