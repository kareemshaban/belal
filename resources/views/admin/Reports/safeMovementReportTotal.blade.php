<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 14 , 'subSlag' => 143])
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
                            <span class="text-muted fw-light">{{__('main.reports_department')}} /</span> {{__('main.safe_movement_report')}}
                        </h4>


                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.safe_movement_report')}}
                        </h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap">
                            <table class="table table-striped table-hover view_table">
                                <thead>
                                <th class="text-center"> {{ __('main.safe') }} </th>
                                <th class="text-center"> {{ __('main.debit') }} </th>
                                <th class="text-center"> {{ __('main.credit') }} </th>
                                <th class="text-center"> {{ __('main.balance') }} </th>

                                </thead>
                                <tbody>

                                @foreach ( $totals as $doc )
                                    <tr >
                                        <td class="text-center"> {{ $doc  ['safe']	 }} </td>
                                        <td class="text-center text-danger" style="font-size: 18px ; font-weight: bold ;"> {{number_format($doc['outMoney'] , 2)}}   </td>
                                        <td class="text-center text-success" style="font-size: 18px ; font-weight: bold ;"> {{number_format($doc ['inMoney']  , 2)}} </td>


                                        <td  style="font-size: 18px ; font-weight: bold ;" class="text-center @if($doc ['inMoney']  - $doc ['outMoney']  < 0 )  text-danger @else text-success @endif"> {{  number_format($doc ['inMoney']  - $doc ['outMoney']  , 2)}} </td>
                                    </tr>



                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center" style="font-size: 18px ; font-weight: bold" >{{__('main.total')}}</th>
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
                        body.prepend('<h2 style="text-align:center; margin-bottom:20px;">تقرير كشف حركة خزنة إجمالي</h2>');
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
                var debit = api.column(1, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                var credit = api.column(2, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                var balance = api.column(3, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);

                // Update footer (use .footer() without filter option)
                $(api.column(1).footer()).html(debit.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                $(api.column(2).footer()).html(credit.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

                var formattedBalance = balance.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                var balanceFooter = $(api.column(3).footer());
                balanceFooter.html(formattedBalance);

                balanceFooter
                    .removeClass('text-danger text-success')
                    .addClass(balance < 0 ? 'text-danger' : 'text-success');
            }

        });

    });
</script>

</body>
</html>
