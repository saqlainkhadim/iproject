<!-- dynamic load more button-->
<div class="kanban-board-element autoload loadmore-button-container <?php echo e($board['load_more']); ?>"
    id="tasks-loadmore-container-<?php echo e($board['id']); ?>">
    <a data-url="<?php echo e($board['load_more_url']); ?>" href="javascript:void(0)"
        class="btn btn-rounded-x btn-secondary js-ajax-ux-request"
        id="load-more-button-<?php echo e($board['id']); ?>"><?php echo e(cleanLang(__('lang.show_more'))); ?></a>
</div>
<!-- /#dynamic load more button--><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/tasks/components/kanban/loadmore-button.blade.php ENDPATH**/ ?>