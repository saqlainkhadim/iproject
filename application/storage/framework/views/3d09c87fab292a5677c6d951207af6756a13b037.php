<?php if(isset($page['page']) && $page['page'] == 'estimates'): ?>
<?php echo $__env->make('pages.estimates.components.actions.checkbox-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<!--main table view-->
<?php echo $__env->make('pages.estimates.components.table.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--filter-->
<?php if(auth()->user()->is_team): ?>
<?php echo $__env->make('pages.estimates.components.misc.filter-estimates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<!--filter--><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/estimates/components/table/wrapper.blade.php ENDPATH**/ ?>