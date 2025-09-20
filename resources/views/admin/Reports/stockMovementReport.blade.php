<!DOCTYPE html>

@include('layouts.head')


<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 14 , 'subSlag' => 142])
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
                            <span class="text-muted fw-light">{{__('main.reports_department')}} /</span> {{__('main.stock_movement_report')}}
                            @if($type == 0)
                                <span class="badge bg-warning">{{__('main.report_type0')}}</span>
                            @elseif($type == 1)
                                <span class="badge bg-success">{{__('main.report_type1')}}</span>
                            @endif
                       </h4>


                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.stock_movement_report')}}
                        </h5>
                        @include('flash-message')
                        <div class="table-responsive  text-nowrap ">
                            <table class="table table-striped table-hover view_table">
                                <thead>
                                <th class="text-center"> # </th>
                                <th class="text-center"> {{ __('main.store') }} </th>
                                <th class="text-center"> {{ __('main.item') }} </th>
                                <th class="text-center"> {{ __('main.docType') }} </th>

                                <th class="text-center"> {{ __('main.quantity_in') }} </th>
                                <th class="text-center"> {{ __('main.quantity_out') }} </th>
                                <th class="text-center"> {{ __('main.weight_in') }} </th>
                                <th class="text-center"> {{ __('main.weight_out') }} </th>

                                </thead>
                                <tbody>


                                @foreach ( $data as $doc )
                                    <tr >
                                        <td class="text-center"> {{ $loop -> index + 1}} </td>
                                        <td class="text-center"> {{ $doc -> store	 }} </td>

                                        <td class="text-center"> {{ $doc -> item }} </td>
                                        <td class="text-center">
                                                <span @if ($doc -> type == 0 || $doc -> type == 1 || $doc -> type == 4) class="badge bg-success"
                                                      @else class="badge bg-danger" @endif>
                                                     @if($doc -> type == 0)
                                                        {{__('main.sDoc0')}}
                                                    @elseif($doc -> type == 1)
                                                        {{__('main.sDoc1')}}
                                                    @elseif($doc -> type == 2)
                                                        {{__('main.sDoc2')}}
                                                    @elseif($doc -> type == 3)
                                                        {{__('main.sDoc3')}}
                                                    @elseif($doc -> type == 4)
                                                        {{__('main.sDoc4')}}
                                                    @elseif($doc -> type == 5)
                                                        {{__('main.sDoc5')}}
                                                    @endif
                                                </span>
                                        </td>
                                        <td class="text-center text-success" style="font-size: 18px ; font-weight: bold ;"> {{$doc -> quantity_in}} </td>
                                        <td class="text-center text-danger" style="font-size: 18px ; font-weight: bold ;"> {{$doc -> quantity_out}} </td>
                                        <td class="text-center text-success" style="font-size: 18px ; font-weight: bold ;"> {{$doc -> weight_in}} </td>
                                        <td class="text-center text-danger" style="font-size: 18px ; font-weight: bold ;"> {{$doc -> weight_out}} </td>
                                    </tr>



                                @endforeach

                                </tbody>

                                <tfoot>
                                <tr>
                                    <th class="text-center" style="font-size: 18px ; font-weight: bold" colspan="4">{{__('main.total')}}</th>
                                    <th class="text-center text-danger" style="font-size: 18px ; font-weight: bold"> </th>
                                    <th class="text-center text-success" style="font-size: 18px ; font-weight: bold"> </th>
                                    <th class="text-center text-success" style="font-size: 18px ; font-weight: bold"> </th>
                                    <th class="text-center text-danger" style="font-size: 18px ; font-weight: bold"> </th>
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
                        body.prepend('<h2 style="text-align:center; margin-bottom:20px;">تقرير كشف حركة صنف</h2>');
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
                var qIn = api.column(4, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                var qOut = api.column(5, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                var wIn = api.column(6, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                var wOut = api.column(7, { filter: 'applied' }).data().reduce((a, b) => intVal(a) + intVal(b), 0);


                // Update footer (use .footer() without filter option)
                $(api.column(4).footer()).html(qIn.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                $(api.column(5).footer()).html(qOut.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                $(api.column(6).footer()).html(wIn.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                $(api.column(7).footer()).html(wOut.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

            }

        });

    });
</script>

</body>
</html>
