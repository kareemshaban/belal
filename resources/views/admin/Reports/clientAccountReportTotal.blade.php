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
                                <th class="text-center"> {{ __('main.client') }} </th>
                                <th class="text-center"> {{ __('main.credit') }} </th>
                                <th class="text-center"> {{ __('main.debit') }} </th>

                                <th class="text-center"> {{ __('main.balance') }} </th>

                                </thead>
                                <tbody>

                                @foreach ( $totals as $doc )
                                    <tr >
                                        <td class="text-center"> {{ $doc  ['client']	 }} </td>
                                        <td class="text-center text-danger" style="font-size: 18px ; font-weight: bold ;"> {{number_format($doc ['credit']  , 2)}} </td>
                                        <td class="text-center text-success" style="font-size: 18px ; font-weight: bold ;"> {{number_format($doc['debit'] , 2)}}   </td>



                                        <td  style="font-size: 18px ; font-weight: bold ;" class="text-center @if($doc ['credit']  - $doc ['debit']  < 0 )  text-success @else text-danger @endif"> {{  number_format($doc ['credit']  - $doc ['debit']  , 2)}} </td>
                                    </tr>



                                @endforeach


                                </tbody>


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
            searching:false,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json'

            },


        });

    });
</script>

</body>
</html>
