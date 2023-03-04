 <?php $__env->startSection('content'); ?>
<!-- main content -->
<div class="container-fluid" id="wrapper-tickets">

    <!--page heading-->
    <div class="row page-titles">

        <!-- Page Title & Bread Crumbs -->
        <?php echo $__env->make('misc.heading-crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--Page Title & Bread Crumbs -->

    </div>
    <!--page heading-->


    <!-- page content -->
    <div class="row">
        <div class="col-12" id="tickets-table-wrapper">
            <!--tickets table-->
            <?php echo $__env->make('pages.tickets.components.create.compose', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--tickets table-->
        </div>
    </div>
    <!--page content -->
</div>
<!--main content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u967487462/domains/shsiinc.com/public_html/application/resources/views/pages/tickets/components/create/wrapper.blade.php ENDPATH**/ ?>