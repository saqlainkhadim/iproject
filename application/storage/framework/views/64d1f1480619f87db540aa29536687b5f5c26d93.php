<!--main table view-->
<?php echo $__env->make('pages.subscriptions.components.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--filter-->
<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('pages.subscriptions.components.misc.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter--><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/subscriptions/components/table/wrapper.blade.php ENDPATH**/ ?>