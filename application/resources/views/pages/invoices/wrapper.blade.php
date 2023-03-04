@extends('layout.wrapper') @section('content')
<!-- main content -->
<div class="container-fluid">

    <!--page heading-->
    <div class="row page-titles">

        <!-- Page Title & Bread Crumbs -->
        @include('misc.heading-crumbs')
        <!--Page Title & Bread Crumbs -->


        <!-- action buttons -->
        @include('pages.invoices.components.misc.list-page-actions')
        <!-- action buttons -->

    </div>
    <!--page heading-->

    <!--stats panel-->
  
    <!--stats panel-->


    <!-- page content -->
    <div class="row">
        <div class="col-12">
            <!--invoices table-->
            @include('pages.invoices.components.table.wrapper')
            <!--invoices table-->
        </div>
    </div>
    <!--page content -->

</div>
<!--main content -->
@endsection