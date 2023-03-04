<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!--each row-->
<tr id="team_<?php echo e($team->id); ?>">
    <td class="team_col_first_name">
        <img src="<?php echo e($team->avatar); ?>" alt="user" class="img-circle avatar-xsmall"> <?php echo e($team->first_name); ?>

        <?php echo e(runtimeCheckBlank($team->last_name)); ?>

        <!--administrator-->
        <?php if($team->primary_admin == 'yes'): ?>
        <span class="sl-icon-star text-warning p-l-5" data-toggle="tooltip"
            title="<?php echo e(cleanLang(__('lang.main_administrator'))); ?>" id="team_admin_<?php echo e($team->id); ?>"></span>
        <?php endif; ?>
    </td>
    <td class="team_col_position" style="display: none;">
        <?php echo e(str_limit(runtimeCheckBlank($team->position), 20)); ?>

    </td>
    <?php if(config('visibility.action_super_user')): ?>
    <td class="team_col_role"><?php echo e(runtimeCheckBlank($team->role['role_name'])); ?></td>
    <?php endif; ?>
    <td class="team_col_email">
        <?php echo e(runtimeCheckBlank($team->email)); ?>

    </td>
    <td class="team_col_phone">
        <?php echo e(runtimeCheckBlank($team->phone)); ?>

    </td>
  
    <?php if(config('visibility.action_super_user')): ?>
    <td class="team_col_action">
        <!--action buttons-->
        <span class="list-table-action dropdown font-size-inherit">
            <!--delete-->
            <?php if(runtimeTeamPermissionDelete($team)): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.delete'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm confirm-action-danger"
                data-confirm-title="<?php echo e(cleanLang(__('lang.delete_user'))); ?>"
                data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
                data-url="<?php echo e(url('/')); ?>/team/<?php echo e($team->id ?? ''); ?>">
                <i class="sl-icon-trash"></i>
            </button>
            <?php else: ?>
            <!--optionally show disabled button?-->
            <span class="btn btn-outline-default btn-circle btn-sm disabled <?php echo e(runtimePlaceholdeActionsButtons()); ?>"
                data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.actions_not_available'))); ?>"><i
                    class="sl-icon-trash"></i></span>
            <?php endif; ?>
            <!--delete-->
            <!--edit-->
            <?php if(runtimeTeamPermissionEdit($team)): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.edit'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-success btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal" data-url="<?php echo e(urlResource('/team/'.$team->id.'/edit')); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo e(cleanLang(__('lang.edit_user'))); ?>"
                data-action-url="<?php echo e(urlResource('/team/'.$team->id)); ?>" data-action-method="PUT"
                data-action-ajax-class="" data-action-ajax-loading-target="team-td-container">
                <i class="sl-icon-note"></i>
            </button>
            <?php else: ?>
            <!--optionally show disabled button?-->
            <span class="btn btn-outline-default btn-circle btn-sm disabled <?php echo e(runtimePlaceholdeActionsButtons()); ?>"
                data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.actions_not_available'))); ?>"><i
                    class="sl-icon-note"></i></span>
            <?php endif; ?>
            <!--edit-->
            <!--send email-->
            <button style="display: none;" type="button" title="<?php echo app('translator')->get('lang.send_email'); ?>"
                class="data-toggle-action-tooltip btn btn-outline-warning btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="<?php echo e(url('/appwebmail/compose?view=modal&resource_type=user&resource_id='.$team->id)); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo app('translator')->get('lang.send_email'); ?>"
                data-action-url="<?php echo e(url('/appwebmail/send')); ?>" data-action-method="POST" data-modal-size="modal-xl"
                data-action-ajax-loading-target="clients-td-container">
                <i class="ti-email display-inline-block m-t-3"></i>
            </button>
            <!--change password-->
            <?php if(runtimeTeamPermissionEdit($team)): ?>
            <button type="button" title="<?php echo e(cleanLang(__('lang.update_password'))); ?>"
                class="data-toggle-action-tooltip btn btn-outline-default btn-circle btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                data-toggle="modal" data-target="#commonModal"
                data-url="<?php echo e(urlResource('/user/updatepassword?team_id='.$team->id)); ?>"
                data-loading-target="commonModalBody" data-modal-title="<?php echo e(cleanLang(__('lang.update_password'))); ?>"
                data-action-url="<?php echo e(urlResource('/user/updatepassword')); ?>" data-action-method="PUT"
                data-action-ajax-class="" data-action-ajax-loading-target="contacts-td-container">
                <i class="sl-icon-lock"></i>
            </button>
            <?php else: ?>
            <!--optionally show disabled button?-->
            <span class="btn btn-outline-default btn-circle btn-sm disabled <?php echo e(runtimePlaceholdeActionsButtons()); ?>"
                data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.actions_not_available'))); ?>"><i
                    class="sl-icon-lock"></i></span>
            <?php endif; ?>
        </span>
        <!--action buttons-->
    </td>
    <?php endif; ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--each row--><?php /**PATH /home/u967487462/domains/iprotectph.online/public_html/application/resources/views/pages/team/components/table/ajax.blade.php ENDPATH**/ ?>