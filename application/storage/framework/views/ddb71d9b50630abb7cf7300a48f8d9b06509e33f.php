
<?php $__env->startSection('settings-page'); ?>
<!--settings-->
<form class="form" id="settingsFormInvoices">
    <!--form text tem-->
    <div class="form-group row">
        <label class="col-12 control-label col-form-label"><?php echo e(cleanLang(__('lang.invoice_prefix'))); ?></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="settings_invoices_prefix"
                name="settings_invoices_prefix" value="<?php echo e($settings->settings_invoices_prefix ?? ''); ?>">
        </div>
    </div>


    <!--next id-->
    <div class="form-group row">
        <label class="col-12 control-label col-form-label"><?php echo app('translator')->get('lang.next_id_number_invoice'); ?> (<?php echo app('translator')->get('lang.optional'); ?>)
            <!--info tooltip-->
             <span class="align-middle text-themecontrast" data-toggle="tooltip"
                    title="<?php echo app('translator')->get('lang.next_id_number_info'); ?>" data-placement="top"><i
                        class="ti-info-alt"></i></span></label>
        <div class="col-12">
            <input type="text" class="form-control form-control-sm" id="next_id" name="next_id" value="<?php echo e($next_id); ?>">
            <input type="hidden" name="next_id_current" value="<?php echo e($next_id); ?>">
        </div>
    </div>

    <!--form text tem-->
    <div class="form-group row">
        <label
            class="col-12 control-label col-form-label font-16"><?php echo e(cleanLang(__('lang.bill_recurring_grace_period'))); ?>

            <span class="align-middle text-themecontrast" data-toggle="tooltip"
                title="<?php echo e(cleanLang(__('lang.bill_recurring_grace_period_info'))); ?>" data-placement="top"><i
                    class="ti-info-alt"></i></span></label>
        <div class="col-12">
            <input type="number" class="form-control form-control-sm" id="settings_invoices_recurring_grace_period"
                name="settings_invoices_recurring_grace_period"
                value="<?php echo e($settings->settings_invoices_recurring_grace_period ?? ''); ?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-12 col-form-label"><?php echo e(cleanLang(__('lang.terms_and_conditions'))); ?></label>
        <div class="col-12 p-t-5">
            <textarea class="form-control form-control-sm tinymce-textarea" rows="5"
                name="settings_invoices_default_terms_conditions" id="settings_invoices_default_terms_conditions">
                    <?php echo e($settings->settings_invoices_default_terms_conditions ?? ''); ?>

                </textarea>
        </div>
    </div>


    <!--form checkbox item-->
    <div class="form-group form-group-checkbox row">
        <div class="col-12 p-t-5">
            <input type="checkbox" id="settings_invoices_show_view_status" name="settings_invoices_show_view_status"
                class="filled-in chk-col-light-blue"
                <?php echo e(runtimePrechecked($settings['settings_invoices_show_view_status'] ?? '')); ?>>
            <label
                for="settings_invoices_show_view_status"><?php echo e(cleanLang(__('lang.show_if_client_has_opened'))); ?></label>
        </div>
    </div>

    <div>
        <!--settings documentation help-->
        <a href="https://growcrm.io/documentation/invoice-settings/" target="_blank"
            class="btn btn-sm btn-info help-documentation"><i class="ti-info-alt"></i>
            <?php echo e(cleanLang(__('lang.help_documentation'))); ?></a>
    </div>

    <!--buttons-->
    <div class="text-right">
        <button type="submit" id="commonModalSubmitButton" class="btn btn-rounded-x btn-danger waves-effect text-left"
            data-url="/settings/invoices" data-loading-target="" data-ajax-type="PUT" data-type="form"
            data-on-start-submit-button="disable"><?php echo e(cleanLang(__('lang.save_changes'))); ?></button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.ajaxwrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u967487462/domains/iprotectph.online/public_html/application/resources/views/pages/settings/sections/invoices/page.blade.php ENDPATH**/ ?>