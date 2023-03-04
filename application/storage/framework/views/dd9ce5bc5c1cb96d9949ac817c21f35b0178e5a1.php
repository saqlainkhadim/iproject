        <!--HEADER-->
        <div class="billing-mode-only-item">
            <span class="pull-left">
                <h3><b><?php echo e(cleanLang(__('lang.invoice'))); ?></b>
                    <!--recurring icon-->
                    <?php echo $__env->make('pages.bill.components.elements.invoice.icons-recuring', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </h3>
                <span>
                    <h5>#<?php echo e($bill->formatted_bill_invoiceid); ?></h5>
                </span>
            </span>
            <!--status-->
            <span class="pull-right text-align-right">
                <!--draft-->
                <span class="js-invoice-statuses <?php echo e(runtimeInvoiceStatus('draft', $bill->bill_status)); ?>"
                    id="invoice-status-draft">
                    <h1 class="text-uppercase <?php echo e(runtimeInvoiceStatusColors('draft', 'text')); ?> muted">
                        <?php echo e(cleanLang(__('lang.draft'))); ?></h1>
                        <img src="https://iprotectph.online/storage/logos/app/logo.jpg?v=1675133486"><br/>
                </span>
                <!--due-->
                <span class="js-invoice-statuses <?php echo e(runtimeInvoiceStatus('due', $bill->bill_status)); ?>"
                    id="invoice-status-due">
                   <img src="https://iprotectph.online/storage/logos/app/logo.jpg?v=1675133486"><br/>
                </span>
                <!--overdue-->
                <span class="js-invoice-statuses <?php echo e(runtimeInvoiceStatus('overdue', $bill->bill_status)); ?>"
                    id="invoice-status-overdue">
                <img src="https://iprotectph.online/storage/logos/app/logo.jpg?v=1675133486"><br/>
                </span>
                <!--paid-->
                <span class="js-invoice-statuses <?php echo e(runtimeInvoiceStatus('paid', $bill->bill_status)); ?>"
                    id="invoice-status-paid">
                  <img src="https://iprotectph.online/storage/logos/app/logo.jpg?v=1675133486"><br/>
                </span>
                <?php if(config('system.settings_estimates_show_view_status') == 'yes' && auth()->user()->is_team &&
                $bill->bill_status != 'draft' && $bill->bill_status != 'paid'): ?>
                <?php if($bill->bill_viewed_by_client == 'no'): ?>
                <span>
                    <span
                        class="label label-light-inverse text-lc font-normal"><?php echo app('translator')->get('lang.client_has_not_opened'); ?></span>
                </span>
                <?php endif; ?>
                <?php if($bill->bill_viewed_by_client == 'yes'): ?>
                <span>
                    <span
                        class="label label label-lighter-info text-lc font-normal"><?php echo app('translator')->get('lang.client_has_opened'); ?></span>
                </span>
                <?php endif; ?>
                <?php endif; ?>
            </span>
        </div><?php /**PATH /home/u967487462/domains/iprotectph.online/public_html/application/resources/views/pages/bill/components/elements/invoice/header-web.blade.php ENDPATH**/ ?>