<!--main table view-->
<?php echo $__env->make('pages.tickets.components.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--filter-->
<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('pages.tickets.components.misc.filter-tickets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter-->


<!--export-->
<?php if(config('visibility.list_page_actions_exporting')): ?>
<?php echo $__env->make('pages.export.tickets.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--export--><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/tickets/components/table/wrapper.blade.php ENDPATH**/ ?>