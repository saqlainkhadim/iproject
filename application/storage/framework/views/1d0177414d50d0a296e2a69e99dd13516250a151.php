<div class="table-responsive p-b-30">
    <?php if(@count($statuses) > 0): ?>
    <table id="task-stages" class="table m-t-0 m-b-0 table-hover no-wrap contact-list" data-page-size="10"
        data-type="form" data-form-id="task-stages" data-ajax-type="post"
        data-url="<?php echo e(url('settings/tasks/update-stage-positions')); ?>">
        <thead>
            <tr>
                <th class="status_col_name"><?php echo e(cleanLang(__('lang.name'))); ?></th>
                <th class="status_col_count"><?php echo e(cleanLang(__('lang.tasks'))); ?></th>
                <th class="status_col_color"><?php echo e(cleanLang(__('lang.color'))); ?></th>
                <th class="status_col_created_by"><?php echo e(cleanLang(__('lang.created_by'))); ?></th>
                <th class="status_col_action w-px-110"><a href="javascript:void(0)"><?php echo e(cleanLang(__('lang.action'))); ?></a></th>
            </tr>
        </thead>
        <tbody id="status-td-container">
            <!--ajax content here-->
            <?php echo $__env->make('pages.settings.sections.tasks.table.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--ajax content here-->
        </tbody>
    </table>
    <?php endif; ?>
    <?php if(@count($statuses) == 0): ?>
    <!--nothing found-->
    <?php echo $__env->make('notifications.no-results-found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--nothing found-->
    <?php endif; ?>
</div><?php /**PATH /home/u967487462/domains/iprotectph.online/public_html/application/resources/views/pages/settings/sections/tasks/table/table.blade.php ENDPATH**/ ?>