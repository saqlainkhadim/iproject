
<?php $__env->startSection('settings-page'); ?>
<!-- action buttons -->
<?php echo $__env->make('pages.settings.sections.tasks.misc.list-page-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- action buttons -->

<!--heading-->
<?php echo $__env->make('pages.settings.sections.tasks.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div>
    <!--settings documentation help-->
    <a href=""  target="_blank" class="btn btn-sm btn-info  help-documentation"><i class="ti-info-alt"></i> <?php echo e(cleanLang(__('lang.help_documentation'))); ?></a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u967487462/domains/iprotectph.online/public_html/application/resources/views/pages/settings/sections/tasks/table/page.blade.php ENDPATH**/ ?>