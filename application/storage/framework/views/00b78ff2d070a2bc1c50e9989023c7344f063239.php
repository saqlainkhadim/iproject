<!--heading-->
<div class="x-heading p-t-10"><i class="mdi mdi-file-document-box"></i><?php echo e(cleanLang(__('lang.my_notes'))); ?></div>



<!--Form Data-->
<div class="card-show-form-data " id="card-task-mynotes">
    <div class="x-notes-editor">
        <div class="form-group row">
            <div class="col-12">
                <textarea class="form-control form-control-sm tinymce-textarea" name="task_mynotes"
                    id="task_mynotes"><?php echo _clean($note->note_description ?? ''); ?></textarea>
            </div>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-danger btn-xs ajax-request" data-loading-target="card-tasks-left-panel"
            data-url="<?php echo e(url('/tasks/content/'.$task->task_id.'/edit-mynotes')); ?>" data-type="form"
            data-loading-class="loading-before-centre" data-ajax-type="post" data-form-id="card-task-mynotes">
            <?php echo e(cleanLang(__('lang.update'))); ?>

        </button>
    </div>
</div><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/task/content/mynotes/edit.blade.php ENDPATH**/ ?>