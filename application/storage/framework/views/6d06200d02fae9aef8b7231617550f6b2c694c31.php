<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12  col-lg-5 align-self-center text-right p-b-9 <?php echo e($page['list_page_actions_size'] ?? ''); ?> <?php echo e($page['list_page_container_class'] ?? ''); ?>"
    id="list-page-actions-container">
    <div id="list-page-actions">
        <?php if(auth()->user()->is_team && auth()->user()->role->role_invoices >= 2): ?>
        <!--reminder-->
        <?php if(config('visibility.modules.reminders')): ?>
        <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.reminder'))); ?>"
            id="reminders-panel-toggle-button"
            class="reminder-toggle-panel-button list-actions-button btn btn-page-actions waves-effect waves-dark js-toggle-reminder-panel ajax-request <?php echo e($bill->reminder_status); ?>"
            data-url="<?php echo e(url('reminders/start?resource_type=invoice&resource_id='.$bill->bill_invoiceid)); ?>"
            data-loading-target="reminders-side-panel-body" data-progress-bar='hidden'
            data-target="reminders-side-panel" data-title="<?php echo app('translator')->get('lang.my_reminder'); ?>">
            <i class="ti-alarm-clock"></i>
        </button>
        <?php endif; ?>
        <?php if($bill->bill_status == 'draft'): ?>
        <!--publish-->
        <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.publish_invoice'))); ?>"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark confirm-action-info"
            href="javascript:void(0)" data-confirm-title="<?php echo e(cleanLang(__('lang.publish_invoice'))); ?>"
            data-confirm-text="<?php echo e(cleanLang(__('lang.the_invoice_will_be_sent_to_customer'))); ?>"
            data-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/publish')); ?>"
            id="invoice-action-publish-invoice"><i class="sl-icon-share-alt"></i></button>
        <?php endif; ?>
        <!--email invoice-->
        <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.send_email'))); ?>"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark confirm-action-info"
            href="javascript:void(0)" data-confirm-title="<?php echo e(cleanLang(__('lang.send_email'))); ?>"
            data-confirm-text="<?php echo e(cleanLang(__('lang.confirm'))); ?>"
            data-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/resend')); ?>"
            id="invoice-action-email-invoice"><i class="ti-email"></i></button>
        <!--add payment-->
        <button type="button" title="<?php echo e(cleanLang(__('lang.add_a_payment'))); ?>" id="invoiceAddPaymentButton"
            class="data-toggle-tooltip list-actions-button btn btn-page-actions waves-effect waves-dark js-ajax-ux-request reset-target-modal-form edit-add-modal-button"
            data-toggle="modal" data-target="#commonModal" data-modal-title="<?php echo e(cleanLang(__('lang.add_a_payment'))); ?>"
            data-url="<?php echo e(url('/payments/create?bill_invoiceid='.$bill->bill_invoiceid)); ?>"
            data-action-url="<?php echo e(url('/payments?ref=invoice&source=page&bill_invoiceid='.$bill->bill_invoiceid)); ?>"
            data-loading-target="actionsModalBody" data-action-method="POST">
            <i class="ti-credit-card"></i>
        </button>
        <!--recurring options-->
        <span class="dropdown">
            <button type="button" data-toggle="dropdown" title="<?php echo e(cleanLang(__('lang.recurring_options'))); ?>"
                aria-haspopup="true" aria-expanded="false"
                class="data-toggle-tooltip  list-actions-button btn btn-page-actions waves-effect waves-dark">
                <i class="sl-icon-refresh"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="listTableAction">
                <!--recurring settings-->
                <a class="dropdown-item edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                    href="javascript:void(0)" data-toggle="modal" data-target="#commonModal"
                    data-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/recurring-settings?source=page')); ?>"
                    data-loading-target="commonModalBody"
                    data-modal-title="<?php echo e(cleanLang(__('lang.recurring_settings'))); ?>"
                    data-action-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/recurring-settings?source=page')); ?>"
                    data-action-method="POST"
                    data-action-ajax-loading-target="invoices-td-container"><?php echo e(cleanLang(__('lang.recurring_settings'))); ?></a>
                <a class="dropdown-item <?php echo e(runtimeVisibility('invoice-view-child-invoices', $bill->bill_recurring)); ?>"
                    href="<?php echo e(url('invoices?filter_recurring_parent_id=').$bill->bill_invoiceid); ?>"
                    id="invoice-action-view-children"><?php echo e(cleanLang(__('lang.view_child_invoices'))); ?></a>
                <a class="dropdown-item confirm-action-info display-block <?php echo e(runtimeVisibility('invoice-stop-recurring', $bill->bill_recurring)); ?>"
                    href="javascript:void(0)" data-confirm-title="<?php echo e(cleanLang(__('lang.stop_recurring'))); ?>"
                    data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                    data-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/stop-recurring')); ?>"
                    id="invoice-action-stop-recurring">
                    <?php echo e(cleanLang(__('lang.stop_recurring'))); ?></a>
            </div>
        </span>
        <!--clone-->
        <span class="dropdown">
            <button type="button" class="data-toggle-tooltip list-actions-button btn btn-page-actions waves-effect waves-dark 
                        actions-modal-button js-ajax-ux-request reset-target-modal-form edit-add-modal-button"
                title="<?php echo e(cleanLang(__('lang.clone_invoice'))); ?>" data-toggle="modal" data-target="#commonModal"
                data-modal-title="<?php echo e(cleanLang(__('lang.clone_invoice'))); ?>"
                data-url="<?php echo e(url('/invoices/'.$bill->bill_invoiceid.'/clone')); ?>"
                data-action-url="<?php echo e(url('/invoices/'.$bill->bill_invoiceid.'/clone')); ?>"
                data-loading-target="actionsModalBody" data-action-method="POST">
                <i class=" mdi mdi-content-copy"></i>
            </button>
        </span>
        <!--edit-->
        <span class="dropdown">
            <button type="button" data-toggle="dropdown" title="<?php echo e(cleanLang(__('lang.edit'))); ?>" aria-haspopup="true"
                aria-expanded="false"
                class="data-toggle-tooltip list-actions-button btn btn-page-actions waves-effect waves-dark">
                <i class="sl-icon-note"></i>
            </button>

            <div class="dropdown-menu" aria-labelledby="listTableAction">
                <a class="dropdown-item"
                    href="<?php echo e(url('/invoices/'.$bill->bill_invoiceid.'/edit-invoice')); ?>"><?php echo e(cleanLang(__('lang.edit_invoice'))); ?></a>
                <!--attach project-->
                <a class="dropdown-item confirm-action-danger <?php echo e(runtimeVisibility('dettach-invoice', $bill->bill_projectid)); ?>"
                    href="javascript:void(0)" data-confirm-title="<?php echo e(cleanLang(__('lang.detach_from_project'))); ?>"
                    id="bill-actions-dettach-project" data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>"
                    data-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/detach-project')); ?>">
                    <?php echo e(cleanLang(__('lang.detach_from_project'))); ?></a>
                <!--deattach project-->
                <a class="dropdown-item actions-modal-button js-ajax-ux-request reset-target-modal-form <?php echo e(runtimeVisibility('attach-invoice', $bill->bill_projectid)); ?>"
                    href="javascript:void(0)" data-toggle="modal" data-target="#actionsModal"
                    id="bill-actions-attach-project" data-modal-title="<?php echo e(cleanLang(__('lang.attach_to_project'))); ?>"
                    data-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/attach-project?client_id='.$bill->bill_clientid)); ?>"
                    data-action-url="<?php echo e(urlResource('/invoices/'.$bill->bill_invoiceid.'/attach-project')); ?>"
                    data-loading-target="actionsModalBody" data-action-method="POST">
                    <?php echo e(cleanLang(__('lang.attach_to_project'))); ?></a>
            </div>

        </span>
        <!--delete-->
        <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.delete_invoice'))); ?>"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark confirm-action-danger"
            data-confirm-title="<?php echo e(cleanLang(__('lang.delete_invoice'))); ?>"
            data-confirm-text="<?php echo e(cleanLang(__('lang.are_you_sure'))); ?>" data-ajax-type="DELETE"
            data-url="<?php echo e(url('/')); ?>/invoices/<?php echo e($bill->bill_invoiceid); ?>?source=page"><i
                class="sl-icon-trash"></i></button>

        <?php endif; ?>

        <!--reminder-->
        <?php if(auth()->user()->is_client): ?>
        <?php if(config('visibility.modules.reminders')): ?>
        <button type="button" data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.reminder'))); ?>"
            id="reminders-panel-toggle-button"
            class="reminder-toggle-panel-button list-actions-button btn btn-page-actions waves-effect waves-dark js-toggle-reminder-panel ajax-request <?php echo e($bill->reminder_status); ?>"
            data-url="<?php echo e(url('reminders/start?resource_type=invoice&resource_id='.$bill->bill_invoiceid)); ?>"
            data-loading-target="reminders-side-panel-body" data-progress-bar='hidden'
            data-target="reminders-side-panel" data-title="<?php echo app('translator')->get('lang.my_reminder'); ?>">
            <i class="ti-alarm-clock"></i>
        </button>
        <?php endif; ?>
        <?php endif; ?>

        <!--Download PDF-->
        <a data-toggle="tooltip" title="<?php echo e(cleanLang(__('lang.download'))); ?>" id="invoiceDownloadButton"
            href="<?php echo e(url('/invoices/'.$bill->bill_invoiceid.'/pdf')); ?>"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark" download>
            <i class="mdi mdi-download"></i>
        </a>

    </div>
</div><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/bill/components/misc/invoice/actions.blade.php ENDPATH**/ ?>