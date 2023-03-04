
<?php $__env->startSection('settings-page'); ?>
<!--settings-->
<form class="form" id="settingsFormSubscriptions">
    <!--form text tem-->
    <div class="form-group row">
        <label class="col-12 control-label col-form-label"><?php echo e(cleanLang(__('lang.subscription_prefix'))); ?></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="settings_subscriptions_prefix"
                name="settings_subscriptions_prefix" value="<?php echo e($settings->settings_subscriptions_prefix ?? ''); ?>">
        </div>
    </div>

    <div>
        <!--settings documentation help-->
        <a href="https://growcrm.io/documentation/subscription-settings/"  target="_blank" class="btn btn-sm btn-info help-documentation"><i class="ti-info-alt"></i> <?php echo e(cleanLang(__('lang.help_documentation'))); ?></a>
    </div>
    
    <!--buttons-->
    <div class="text-right">
        <button type="submit" id="commonModalSubmitButton" class="btn btn-rounded-x btn-danger waves-effect text-left"
            data-url="/settings/subscriptions" data-loading-target="" data-ajax-type="PUT" data-type="form"
            data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/settings/sections/subscriptions/page.blade.php ENDPATH**/ ?>