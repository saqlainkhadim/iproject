
<?php $__env->startSection('settings-page'); ?>
<!--settings-->
<form class="form">

    <!--show value-->
    <div class="form-group form-group-checkbox row">
        <label class="col-5 col-form-label"><?php echo e(cleanLang(__('lang.allow_project_managers_to_edit_milestone'))); ?></label>
        <div class="col-7 p-t-5">
            <input type="checkbox" id="settings_projects_assignedperm_milestone_manage" name="settings_projects_assignedperm_milestone_manage" class="filled-in chk-col-light-blue"
                <?php echo e(runtimePrechecked($settings['settings_projects_assignedperm_milestone_manage'] ?? '')); ?>>
            <label for="settings_projects_assignedperm_milestone_manage"></label>
        </div>
    </div>

    <div>
        <!--settings documentation help-->
        <a href="https://growcrm.io/documentation/milestone-settings/"  target="_blank" class="btn btn-sm btn-info help-documentation"><i class="ti-info-alt"></i> <?php echo e(cleanLang(__('lang.help_documentation'))); ?></a>
    </div>
    <!--buttons-->
    <div class="text-right">
        <button type="submit" id="commonModalSubmitButton"
            class="btn btn-rounded-x btn-danger waves-effect text-left js-ajax-ux-request"
            data-url="/settings/milestones/settings" data-loading-target="" data-ajax-type="PUT" data-type="form"
            data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u967487462/domains/iprotectph.online/public_html/application/resources/views/pages/settings/sections/milestones/page.blade.php ENDPATH**/ ?>