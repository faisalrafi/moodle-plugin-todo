/**
 * Confirm modal before delete
 * @package     local_todo/confirmdelete
 * @author      Faisal Abid
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define([
    'jquery',
    'core/ajax',
    'core/str',
    'core/modal_factory',
    'core/modal_events',
    'core/notification'
], function($,
             Ajax,
             str,
             ModalFactory,
             ModalEvents,
             Notification) {
    $('.delete-btn').on('click', function() {
        let elementId = $(this).attr('id');
        let arr = elementId.split("-");
        let taskId = arr[arr.length - 1];
        ModalFactory.create ( {
            type: ModalFactory.types.SAVE_CANCEL,
            title: str.get_string('deletetitle', 'local_todo', '', ''),
            body: str.get_string('modalmsg', 'local_todo','','')
        }).then(function(modal){
            modal.setSaveButtonText(str.get_string('delete','local_todo', '', ''));
            let root = modal.getRoot();
            root.on(ModalEvents.save, function(){
                let wsfunction = 'local_todo_delete_task_by_id';
                let params = {
                    'taskid': taskId,
                };
                let request = {
                    methodname: wsfunction,
                    args: params
                };
                Ajax.call([request])[0].done(function(){
                    window.location.href = $(location).attr('href');
                }).fail(Notification.exception);
            });
            modal.show();
        });
    });
});