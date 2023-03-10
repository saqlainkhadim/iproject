<div class="col-12">
    <div class="table-responsive m-t-40 invoice-table-wrapper {{ config('css.bill_mode') }} clear-both">
        <table class="table table-hover invoice-table {{ config('css.bill_mode') }}">
            <thead>
                <tr>
                    <!--action-->
                    @if(config('visibility.bill_mode') == 'editing')
                    <th class="text-left x-action bill_col_action"></th>
                    @endif
                     <!--quantity-->
                    <th class="text-left x-quantity bill_col_quantity">{{ cleanLang(__('lang.qty')) }}</th>
                      <!--unit price-->
                    <th  class="text-left x-unit bill_col_unit">Title</th>
                    <!--description-->
                    <th class="text-left x-description bill_col_description">{{ cleanLang(__('lang.description')) }}
                    </th>
                   
                  
                    <!--rate-->
                    <th class="text-left x-rate bill_col_rate">Unit Price</th>
                    <!--tax-->
                    <th
                        class="text-left x-tax bill_col_tax {{ runtimeVisibility('invoice-column-inline-tax', $bill->bill_tax_type) }}">
                        {{ cleanLang(__('lang.tax')) }}</th>
                    <!--total-->
                    <th class="text-left x-total bill_col_total" id="bill_col_total">Sub {{ cleanLang(__('lang.total')) }}
                    </th>
                </tr>
            </thead>
            @if(config('visibility.bill_mode') == 'editing')
            <tbody id="billing-items-container">
                @foreach($lineitems as $lineitem)
                <!--plain line-->
                @if($lineitem->lineitem_type == 'plain')
                @include('pages.bill.components.elements.line-plain')
                @endif

                <!--estimation notes-->
                @if($lineitem->item_notes_estimatation != '')
                @include('pages.bill.components.elements.line-estimation-notes')
                @endif

                <!--time line-->
                @if($lineitem->lineitem_type == 'time')
                @include('pages.bill.components.elements.line-time')
                @endif

                <!--dimensions line-->
                @if($lineitem->lineitem_type == 'dimensions')
                @include('pages.bill.components.elements.line-dimensions')
                @endif

                @endforeach
            </tbody>
            @else
            <tbody id="billing-items-container">
                @include('pages.bill.components.elements.lineitems')
            </tbody>
            @endif
        </table>
    </div>
</div>