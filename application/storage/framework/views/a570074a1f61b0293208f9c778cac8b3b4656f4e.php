<?php if(request('fileresource_type') == 'project' && request()->filled('fileresource_id') && config('system.settings2_file_folders_status') == 'enabled'): ?>
<div class="file-folders enabled">


    <!--folders-->
    <?php echo $__env->make('pages.files.components.folders.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--table wrapper-->
    <?php echo $__env->make('pages.files.components.table.table-wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php else: ?>

<!--table wrapper-->
<?php echo $__env->make('pages.files.components.table.table-wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/files/components/table/table.blade.php ENDPATH**/ ?>