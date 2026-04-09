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
            margin-bottom: 40px; /* space for footer */
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

        th, td {
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
        tr, td, th {
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
    @endphp

    <table>
        <thead>
        <tr>
            <th>{{ __('main.day') }}</th>
            <th>{{ __('main.morning_meal') }}</th>
            <th>{{ __('main.evening_meal') }}</th>
        </tr>
        </thead>

        <tbody>
        @foreach($period as $day)
            <tr>
                <td>
                    @if (Config::get('app.locale')=='ar')
                        {{ $day->translatedFormat('l') }}
                    @else
                        {{ $day->format('l') }}
                    @endif
                </td>

                <td>
                    @php
                        $meal0 = $meals->first(fn($m) =>
                            Carbon::parse($m->date)->toDateString() === $day->toDateString()
                            && $m->type == 0
                        );
                    @endphp
                    {{ $meal0->weight ?? '—' }}
                </td>

                <td>
                    @php
                        $meal1 = $meals->first(fn($m) =>
                            Carbon::parse($m->date)->toDateString() === $day->toDateString()
                            && $m->type == 1
                        );
                    @endphp
                    {{ $meal1->weight ?? '—' }}
                </td>
            </tr>
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <td>{{ __('main.total') }}</td>
            <td colspan="2">{{ $totalWeight }} كيلو</td>
        </tr>
        <tr>
            <td>{{ __('main.price') }}</td>
            <td colspan="2">{{ $meals[0]->price ?? 0 }} جنية</td>
        </tr>
        <tr>
            <td>{{ __('main.total_money') }}</td>
            <td colspan="2">{{ $totalMoney }} جنية</td>
        </tr>
        <tr>
            <td>{{ __('main.before_balance') }}</td>
            <td colspan="2">{{ $beforeBalance }} جنية</td>
        </tr>
        <tr>
            <td>{{ __('main.required') }}</td>
            <td colspan="2">{{ $totalMoney + $beforeBalance }} جنية</td>
        </tr>
        <tr>
            <td>{{ __('main.paid') }}</td>
            <td colspan="2">{{ $weekPaid }} جنية</td>
        </tr>
        <tr>
            <td>{{ __('main.remain') }}</td>
            <td colspan="2">{{ $totalMoney + $beforeBalance - $weekPaid }} جنية</td>
        </tr>
        </tfoot>
    </table>

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
