<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 14 , 'subSlag' => 141])
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            @include('layouts.nav')

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div style="display: flex ; justify-content: space-between ; align-items: center">
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">{{__('main.reports_department')}} /</span> {{__('main.client_account_report')}}
                        </h4>


                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.client_account_report')}}
                            @if($type == 0)
                                <span class="badge bg-warning">{{__('main.report_type0')}}</span>
                            @elseif($type == 1)
                                <span class="badge bg-success">{{__('main.report_type1')}}</span>
                            @endif
                            <br>
                            <span style="font-size: 11px ; color: red">{{__('main.credit_debit_note')}}</span>
                        </h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            @if($from_date != "" && $to_date != "")
                                <h3 class="text-center">
                                    {{__('main.period')}} :
                                    {{ \Carbon\Carbon::parse($from_date)->format('Y-m-d') }} -- {{ \Carbon\Carbon::parse($to_date)->format('Y-m-d') }}

                                </h3>
                            @endif
                            <table class="table table-striped table-hover view_table">
                                <thead>
                                <th class="text-center"> # </th>
                                <th class="text-center"> {{ __('main.docType') }} </th>
                                <th class="text-center"> {{ __('main.client') }} </th>
                                <th class="text-center"> {{ __('main.date') }} </th>
                                <th class="text-center"> {{ __('main.docNumber') }} </th>
                                <th class="text-center"> {{ __('main.credit') }} </th>
                                <th class="text-center"> {{ __('main.debit') }} </th>

                                <th class="text-center"> {{ __('main.balance') }} </th>

                                </thead>
                                <tbody>
                                @foreach ( $brfors as $brfore )
                                    <tr>
                                        <td class="text-center"> -- </td>
                                        <td class="text-center">  رصيد ما قبل الفترة </td>
                                        <td class="text-center"> {{ $brfore['client_name']	 }} </td>
                                        <td class="text-center"> ---- </td>
                                        <td class="text-center"> ----</td>
                                        <td class="text-center text-danger" style="font-size: 15px ; font-weight: bold ;"> {{number_format($brfore['credit'] , 2)}} </td>
                                        <td class="text-center text-success" style="font-size: 15px ; font-weight: bold ;"> {{number_format(  $brfore['debit']  , 2)}} </td>

                                        <td style="font-size: 15px ; font-weight: bold ;" class="text-center @if( $brfore['debit']  - $brfore['credit'] > 0 )  text-success @else text-danger @endif"> {{  number_format($brfore['debit'] - $brfore['credit'] , 2) }} </td>
                                    </tr>
                                @endforeach

                                @foreach ( $data as $doc )
                                    <tr >
                                        <td class="text-center"> {{ $loop -> index + 1}} </td>
                                        <td class="text-center">
                                                <span @if ($doc -> type == 0 || $doc -> type == 3 || $doc -> type == 5) class="badge bg-success"
                                                      @else class="badge bg-danger" @endif>
                                                     @if($doc -> type == 0)
                                                        {{__('main.doc0')}}
                                                    @elseif($doc -> type == 1)
                                                        {{__('main.doc1')}}
                                                    @elseif($doc -> type == 2)
                                                        {{__('main.doc2')}}
                                                    @elseif($doc -> type == 3)
                                                        {{__('main.doc3')}}
                                                    @elseif($doc -> type == 4)
                                                        {{__('main.doc4')}}
                                                    @elseif($doc -> type == 5)
                                                        {{__('main.doc5')}}
                                                    @endif
                                                </span>
                                        </td>
                                        <td class="text-center"> {{ $doc -> client	 }} </td>
                                        <td class="text-center">
                                            @if ($doc->type == 4)
                                                {{ \Carbon\Carbon::parse($doc->docDate)->format('Y-m-d') }} -- {{ \Carbon\Carbon::parse($doc->docDate)->addDays(6)->format('Y-m-d') }}
                                            @else
                                                {{ \Carbon\Carbon::parse($doc->docDate)->format('Y-m-d') }}
                                            @endif
                                        </td>                                        <td class="text-center"> {{ $doc -> docNumber	 }} </td>
                                        <td class="text-center text-danger" style="font-size: 18px ; font-weight: bold ;"> {{  ($doc -> type == 0 || $doc -> type == 3 || $doc -> type == 5 )  ? number_format(0 , 2) : number_format($doc -> amount , 2)  }} </td>
                                        <td class="text-center text-success" style="font-size: 18px ; font-weight: bold ;"> {{  ($doc -> type == 0 || $doc -> type == 3 || $doc -> type == 5)  ?  number_format($doc -> amount , 2)  : number_format(0 , 2)}} </td>

                                        <td  style="font-size: 18px ; font-weight: bold ;" class="text-center @if($doc -> type == 0 || $doc -> type == 3 || $doc -> type == 5)  text-success @else text-danger @endif"> {{  ($doc -> type == 2 || $doc -> type == 4 || $doc -> type == 12)  ? number_format($doc -> amount , 2 ) : number_format(-1 * $doc -> amount , 2) }} </td>
                                    </tr>



                                @endforeach



                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center" style="font-size: 18px ; font-weight: bold" colspan="5">{{__('main.total')}}</th>
                                    <th class="text-center text-danger" style="font-size: 18px ; font-weight: bold"> </th>
                                    <th class="text-center text-success" style="font-size: 18px ; font-weight: bold"> </th>
                                    <th class="text-center " style="font-size: 18px ; font-weight: bold"> </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!--/ Responsive Table -->


                </div>
                <!-- / Content -->

                @include('layouts.footer')
                <!-- Footer -->
                @include('layouts.footer_design')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<script>
    $(document).ready(function() {
        $('.view_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy',
                'excel',
                {
                    extend: 'print',
                    text: 'طباعة',
                    exportOptions: {
                        columns: ':visible',
                        footer: true // Include footer
                    },
                    customize: function (win) {
                        var body = $(win.document.body);
                        body.find('h1, .page-title, .header-title').hide();
                        body.prepend('<h2 style="text-align:center; margin-bottom:20px;">تقرير كشف حساب عميل او مورد</h2>');
                        // Apply RTL direction and Arabic styling
                        $(win.document.body).css('direction', 'rtl');

                        var table = $(win.document.body).find('table');

                        // Clone original footer and append to print view
                        var originalFooter = $('.view_table').find('tfoot').clone();
                        table.append(originalFooter);

                        // Apply styles
                        table
                            .addClass('display')
                            .css('direction', 'rtl')
                            .css('text-align', 'right');

                        table.find('thead th, tfoot th')
                            .css('text-align', 'center')
                            .css('font-weight', 'bold');
                    }
                }
            ],

            responsive: true,
            paging: false,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json'

            },

            footerCallback: function (row, data, start, end, display) {
                var api = this.api();

                var intVal = function (i) {
                    return typeof i === 'string'
                        ? parseFloat(i.replace(/[^0-9.-]+/g, '')) || 0
                        : typeof i === 'number'
                            ? i
                            : 0;
                };

                // Calculate filtered totals:
                var debit = api.column(5, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                var credit = api.column(6, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                var balance = api.column(7, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);

                // Update footer (use .footer() without filter option)
                $(api.column(5).footer()).html(debit.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                $(api.column(6).footer()).html(credit.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

                var formattedBalance = balance.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                var balanceFooter = $(api.column(7).footer());
                balanceFooter.html(formattedBalance);

                balanceFooter
                    .removeClass('text-danger text-success')
                    .addClass(balance >= 0 ? 'text-danger' : 'text-success');
            }

        });

    });
</script>

</body>
</html>
