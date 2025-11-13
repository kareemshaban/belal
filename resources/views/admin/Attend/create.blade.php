<!DOCTYPE html>

@include('layouts.head')

<style>
    .week-square {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 1rem;
        margin: 0.5rem;
        text-align: center;
        height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #f8f9fa;
        box-shadow: 1px 1px 5px rgba(0,0,0,0.1);
        cursor: pointer;
    }
    .week-title {
        font-weight: 600;
        font-size: 1.1rem;
    }
    .week-subtitle {
        font-size: 0.9rem;
        color: #555;
        margin-top: 0.3rem;
    }
    .week-state {
        width: fit-content;
        display: block;
        margin: 10px auto;
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar' , ['slag' => 18 , 'subSlag' => 182])
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
                            <span class="text-muted fw-light">{{__('main.employee_department')}} /</span> {{__('main.attendances')}}
                        </h4>


                    </div>



                    <!-- Responsive Table -->
                    <div class="card">
                        <h5 class="card-header">{{__('main.attendances')}}</h5>
                        @include('flash-message')

                        <div class="table-responsive  text-nowrap">

                            <table class="table table-striped table-hover  table-bordered view_table">
                                <thead>
                                @php
                                    use Carbon\Carbon;
                                    use Carbon\CarbonPeriod;

                                    $start = Carbon::parse($startOfWeek);
                                    $end = Carbon::parse($endOfWeek);
                                    $period = CarbonPeriod::create($start, $end);
                                    Carbon::setLocale('ar');
                                @endphp
                                <tr>
                                    <th class="text-center" rowspan="3">#</th>
                                    <th class="text-center" rowspan="3">{{__('main.employee')}}</th>
                                    @foreach ($period as $date)
                                        <th colspan="2" class="text-center">
                                            @if (Config::get('app.locale')=='ar' )
                                                {{ $date->translatedFormat('l') }}
                                            @else
                                                {{ $date->format('l') }}

                                            @endif
                                            <br>
                                            <span> {{ Carbon::parse($date) -> format('d-m-Y') }} </span>

                                        </th>

                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($period as $date)
                                        <th class="text-center text-primary"  >{{ __('main.morning_shift') }}</th>
                                        <th class="text-center text-success" >{{ __('main.evening_shift') }}</th>
                                    @endforeach
                                </tr>


                                </thead>
                                <tbody>
                                   @foreach($result as $item)
                                       <tr>
                                           <td class="text-center"> {{$loop -> index + 1}} </td>
                                           <td class="text-center"> {{$item['employee_name']}} </td>
                                               @foreach($item['attends'] as $attend)
                                               <td class="text-center">
                                                 <input type="checkbox" class="form-check" name="morning_present[]"
                                                        style="display: block;margin: auto;width: 40px;"
                                                        @if($attend['morning_present'] == 1) checked @endif
                                                        data-employee="{{$item['employee_id']}}"
                                                        data-date="{{$attend['date']}}" data-type="0">
                                               </td>
                                               <td class="text-center">
                                                   <input type="checkbox" class="form-check" name="evening_present[]"
                                                          style="display: block;margin: auto;width: 40px;"
                                                          @if($attend['evening_present'] == 1) checked @endif
                                                          data-employee="{{$item['employee_id']}}"
                                                          data-date="{{$attend['date']}}" data-type="1">
                                               </td>
                                           @endforeach
                                       </tr>
                                   @endforeach
                                </tbody>




                            </table>

                        </div>


                    </div>
                    <!--/ Responsive Table -->
                </div>
                <!-- / Content -->

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

<div id="loading-overlay">
    <div class="loader"></div>
    <div class="loading-text">{{__('main.month_loading')}}</div>
</div>

@include('layouts.footer')
<script>

    const dayNames = {
        1: "{{ __('main.day1') }}",
        2: "{{ __('main.day2') }}",
        3: "{{ __('main.day3') }}",
        4: "{{ __('main.day4') }}",
        5: "{{ __('main.day5') }}",
        6: "{{ __('main.day6') }}",
        7: "{{ __('main.day7') }}",
    };
    $(document).ready(function() {

        const monthNames = {
            1: "{{ __('main.month1') }}",
            2: "{{ __('main.month2') }}",
            3: "{{ __('main.month3') }}",
            4: "{{ __('main.month4') }}",
            5: "{{ __('main.month5') }}",
            6: "{{ __('main.month6') }}",
            7: "{{ __('main.month7') }}",
            8: "{{ __('main.month8') }}",
            9: "{{ __('main.month9') }}",
            10: "{{ __('main.month10') }}",
            11: "{{ __('main.month11') }}",
            12: "{{ __('main.month12') }}"
        };

        const yearSelect = document.getElementById('year');
        const currentYear = new Date().getFullYear();
        for(let y = 2020; y <= currentYear + 5; y++) {
            const option = document.createElement('option');
            option.value = y;
            option.textContent = y;
            if(y === currentYear) option.selected = true;
            yearSelect.appendChild(option);
        }

        const monthSelect = document.getElementById('month');

        const currentMonth = new Date().getMonth() + 1;
        Object.keys(monthNames).forEach(key => {
            const option = document.createElement('option');
            option.value = key;
            option.textContent = monthNames[key];

            if (parseInt(key) === currentMonth) option.selected = true;
            monthSelect.appendChild(option);
        });


        const choicesInstance = new Choices(monthSelect, {
            searchEnabled: true,
            itemSelectText: '',
            shouldSort: false
        });
        const choicesInstance2 = new Choices(yearSelect, {
            searchEnabled: true,
            itemSelectText: '',
            shouldSort: false
        });


        renderWeeksGrid(parseInt(yearSelect.value), parseInt(monthSelect.value));

        yearSelect.addEventListener('change', () => {
            renderWeeksGrid(parseInt(yearSelect.value), parseInt(monthSelect.value));
        });
        monthSelect.addEventListener('change', () => {
            renderWeeksGrid(parseInt(yearSelect.value), parseInt(monthSelect.value));
        });


        $(document).on('click', '.week-square', function() {
            const start_date = $(this).data('start');
            const end_date = $(this).data('end');

            let url = "{{ route('getAttendance', [':start_date', ':end_date']) }}";

            url = url.replace(':start_date', start_date);
            url = url.replace(':end_date', end_date);
            document.location.href=url;



        });

    });

    function formatDate(date) {
        // Format as YYYY-MM-DD
        const d = date.getDate().toString().padStart(2, '0');
        const m = (date.getMonth() + 1).toString().padStart(2, '0');
        const y = date.getFullYear();
        return `${y}-${m}-${d}`;
    }

    function getWeekStartFriday(date) {
        // Given any date, get the Friday of that week (start day)
        // JS: 0=Sun,...,5=Fri,6=Sat
        // If date is Friday (5), return date itself
        // else go forward/backward to Friday
        const day = date.getDay();
        // Calculate offset to previous Friday
        const diff = (day >= 5) ? day - 5 : 7 - (5 - day);
        const friday = new Date(date);
        friday.setDate(date.getDate() - diff);
        return friday;
    }

    function getWeeks(year, month) {
        // month is 1-based (1=January, 12=December)

        const weeks = [];

        // Create date at start of month
        let current = new Date(year, month - 1, 1);

        // Find the first Friday on or before the first day of month
        const dayOfWeek = current.getDay(); // Sunday=0 ... Friday=5
        const daysBackToFriday = (dayOfWeek >= 5) ? dayOfWeek - 5 : dayOfWeek + 2;
        current.setDate(current.getDate() - daysBackToFriday);

        while (true) {
            // Start date of week
            let weekStart = new Date(current);
            // End date of week = 6 days after start (Friday -> Thursday)
            let weekEnd = new Date(current);
            weekEnd.setDate(weekEnd.getDate() + 6);

            // Push this week to array
            weeks.push({start: weekStart, end: weekEnd});

            // Move to next week
            current.setDate(current.getDate() + 7);

            // Stop if the start of the week is past the month
            if (current.getMonth() > month - 1 || current.getFullYear() > year) break;
        }

        return weeks;
    }

    function renderWeeksGrid(year, month) {
        const weeksGrid = document.getElementById('weeksGrid');
        weeksGrid.innerHTML = '';

        const weeks = getWeeks(year, month);
        let windex = 0 ;
        weeks.forEach(week => {
            windex ++ ;
            const startDayName = dayNames[week.start.getDay() + 1];
            const endDayName = dayNames[week.end.getDay() + 1];



            const startDateStr = formatDate(week.start);
            const endDateStr = formatDate(week.end);

            // Create card div
            const colDiv = document.createElement('div');
            colDiv.className = 'col';

            const cardDiv = document.createElement('div');
            cardDiv.className = 'week-square';

            cardDiv.id = startDateStr ;
            cardDiv.setAttribute('data-start', startDateStr);
            cardDiv.setAttribute('data-end', endDateStr);


            // Title
            const title = document.createElement('div');
            title.className = 'week-title';
            title.textContent = `${startDayName} - ${endDayName} (${windex}) ` ;

            // Subtitle
            const subtitle = document.createElement('div');
            subtitle.className = 'week-subtitle';
            subtitle.textContent = `${startDateStr} - ${endDateStr}`;

            cardDiv.appendChild(title);
            cardDiv.appendChild(subtitle);
            colDiv.appendChild(cardDiv);
            weeksGrid.appendChild(colDiv);


            //  getMeals(week.start.getMonth() + 1 , week.start.getFullYear() ,week.start.getDate().toString().padStart(2, '0') , startDateStr);
        });
    }




    $(document).on('change', '.form-check', function() {
        const employeeId = $(this).data('employee');
        const date = $(this).data('date');
        const type = $(this).data('type'); // 0=morning, 1=evening
        const present = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: "{{ route('store-attendance') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                employee_id: employeeId,
                date: date,
                type: type,
                present: present
            },
            success: function(response) {
              //  console.log('Attendance updated', response);
                toastr.success("تم حفظ البيانات بنجاح");
            },
            error: function(xhr) {
                alert('Error updating attendance');
                console.log(xhr.responseText);
                toastr.error("حدث خطأ في عملية الحفظ");
            }
        });
    });


</script>


</body>
</html>
