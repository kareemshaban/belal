<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>طباعة تقرير</title>

    <style>
        /* Page setup */
        @page {
            size: A4;
            margin: 12mm;
        }

        body {
            font-family: "Cairo", "Tahoma", Arial, sans-serif;
            font-size: 13px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        /* Header */
        .print-header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 6px;
            margin-bottom: 10px;
        }

        .print-header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .print-header .meta {
            font-size: 12px;
            margin-top: 4px;
        }

        /* Footer */
        .print-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 11px;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        /* Content */
        .content {
            margin-bottom: 40px;
            /* space for footer */
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 13px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background: #f2f2f2;
            font-weight: bold;
        }

        tfoot td {
            font-weight: bold;
        }

        /* Prevent page breaks */
        tr,
        td,
        th {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="print-header">
        <h2>مصنع أولاد بلال لمنتجات الألبان</h2>
        <div class="meta">
            تاريخ الطباعة :
            {{ now()->format('Y-m-d H:i') }}
        </div>
    </div>

    <!-- Content -->
    <div class="content">

        <div class="info-row">
            <div>
                <strong>{{ __('main.supplier') }} :</strong>
                {{ $supplier->name }}
            </div>
            <div>
                (
                @if (Config::get('app.locale')=='en')
                {{ $dayName }}
                @else
                {{ $dayName_ar }}
                @endif
                {{ \Carbon\Carbon::parse($startOfWeek)->format('Y-m-d') }}
                —
                @if (Config::get('app.locale')=='en')
                {{ $end_dayName }}
                @else
                {{ $end_dayName_ar }}
                @endif
                {{ \Carbon\Carbon::parse($endOfWeek)->format('Y-m-d') }}
                )
            </div>
        </div>

        @php
        use Carbon\Carbon;
        use Carbon\CarbonPeriod;

        $start = Carbon::parse($startOfWeek);
        $end = Carbon::parse($endOfWeek);
        $period = CarbonPeriod::create($start, $end);
        Carbon::setLocale('ar');

        // فحص هل يوجد أي إنتاج جاموسي في هذه الفترة لإظهار أو إخفاء الأعمدة
        $hasBuffalo = $meals->sum('buffalo_weight') > 0;
        @endphp

        <table>
            <thead>
                <tr>
                    <th rowspan="{{ $hasBuffalo ? 2 : 1 }}"> {{ __('main.day') }}</th>
                    <th colspan="{{ $hasBuffalo ? 2 : 1 }}">{{ __('main.morning_meal') }}</th>
                    <th colspan="{{ $hasBuffalo ? 2 : 1 }}">{{ __('main.evening_meal') }}</th>
                </tr>
                @if($hasBuffalo)
                <tr>
                    <th>بقري</th>
                    <th>جاموسي</th>
                    <th>بقري</th>
                    <th>جاموسي</th>
                </tr>
                @endif
            </thead>

            <tbody>
                @foreach($period as $day)
                <tr>
                    <td>
                        {{ (Config::get('app.locale')=='ar') ? $day->translatedFormat('l') : $day->format('l') }}
                    </td>

                    @php
                    // جلب بيانات الصباح والمساء لليوم الحالي
                    $m0 = $meals->first(fn($m) => Carbon::parse($m->date)->toDateString() === $day->toDateString() &&
                    $m->type == 0);
                    $m1 = $meals->first(fn($m) => Carbon::parse($m->date)->toDateString() === $day->toDateString() &&
                    $m->type == 1);
                    @endphp

                    <td>{{ $m0->bovine_weight ?? '—' }}</td>
                    @if($hasBuffalo)
                    <td>{{ $m0->buffalo_weight ?? '—' }}</td>
                    @endif

                    <td>{{ $m1->bovine_weight ?? '—' }}</td>
                    @if($hasBuffalo)
                    <td>{{ $m1->buffalo_weight ?? '—' }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>

        </table>
        <br>

        </tbody>
        </table>

        <br>

        <table>
            <thead>
                <tr>
                    <th>البيان</th>
                    <th>بقري</th>
                    @if($hasBuffalo)
                    <th>جاموسي</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>إجمالي الوزن </strong></td>
                    <td>{{ $meals->sum('bovine_weight') }} كيلو</td>
                    @if($hasBuffalo)
                    <td>{{ $meals->sum('buffalo_weight') }} كيلو</td>
                    @endif
                </tr>
                <tr>
                    <td><strong>{{ __('main.price') }}</strong></td>
                    <td>{{ $meals[0]->bovine_price ?? 0 }} جنية</td>
                    @if($hasBuffalo)
                    <td>{{ $meals[0]->buffalo_price ?? 0 }} جنية</td>
                    @endif
                </tr>
            </tbody>
        </table>

        <br>

        <table style="width: 50%; margin-right: auto;">
            <tbody>
                <tr>
                    <td style="background: #f2f2f2; width: 50%;">{{ __('main.total_money') }}</td>
                    <td>{{ $totalMoney }} جنية</td>
                </tr>
                <tr>
                    <td style="background: #f2f2f2;">{{ __('main.before_balance') }}</td>
                    <td>{{ $beforeBalance + $weekPaid }} جنية</td>
                </tr>
                <tr>
                    <td style="background: #f2f2f2;">{{ __('main.required') }}</td>
                    <td><strong>{{ $totalMoney + ($beforeBalance + $weekPaid) }} جنية</strong></td>
                </tr>
                <tr>
                    <td style="background: #f2f2f2;">{{ __('main.paid') }}</td>
                    <td>{{ $weekPaid }} جنية</td>
                </tr>
                <tr style="font-size: 15px; background: #eee;">
                    <td><strong>{{ __('main.remain') }}</strong></td>
                    <td><strong>{{ $totalMoney + $beforeBalance }} جنية</strong></td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="print-footer">
        مصنع أولاد بلال لمنتجات الألبان — تقرير داخلي
    </div>

    </div>

    <!-- Footer -->
    <div class="print-footer">
        مصنع أولاد بلال لمنتجات الألبان — تقرير داخلي
    </div>

    <script>
        window.onload = function () {
        window.print();
        window.onafterprint = () => window.close();
    };
    </script>

</body>

</html>
