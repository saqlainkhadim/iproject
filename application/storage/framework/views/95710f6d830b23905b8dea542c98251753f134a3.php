<!--bulk actions-->
<?php echo $__env->make('pages.invoices.components.actions.checkbox-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--main table view-->
<?php echo $__env->make('pages.invoices.components.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--filter-->
<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('pages.invoices.components.misc.filter-invoices', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter--><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/invoices/components/table/wrapper.blade.php ENDPATH**/ ?>