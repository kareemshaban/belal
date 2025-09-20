<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>فاتورة رقم {{ $doc->bill_number }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            direction: rtl;
            text-align: right;
            margin: 20px;
            font-size: 14px;
        }

        .invoice-box {
            max-width: 900px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-direction: row-reverse;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .totals {
            margin-top: 20px;
            float: left;
            width: 300px;
        }

        .totals table {
            border: none;
        }

        .totals td {
            border: none;
            text-align: left;
            padding: 5px 0;
        }

        .notes {
            margin-top: 40px;
            clear: both;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <div class="header">
        <div>
            <div class="invoice-title">فاتورة بيع</div>
            <div>رقم الفاتورة: {{ $doc->bill_number }}</div>
            <div>التاريخ: {{ \Carbon\Carbon::parse($doc->date)->format('d-m-Y') }}</div>
        </div>
        <div>
            <strong>العميل:</strong> {{ $doc->client_name ?? '-' }}<br>
            <strong>المخزن:</strong> {{ $doc->store_name ?? '-' }}
        </div>
    </div>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>الصنف</th>
            <th>الكمية</th>
            <th>الوزن</th>
            <th>السعر</th>
            <th>الإجمالي</th>
        </tr>
        </thead>
        <tbody>
        @foreach($details as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->item_code }} - {{ $item->item_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->weight }}</td>
                <td>{{ number_format($item->price, 2) }}</td>
                <td>{{ number_format($item->total, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="totals">
        <table>
            <tr>
                <td><strong>الإجمالي:</strong></td>
                <td>{{ number_format($doc->total, 2) }}</td>
            </tr>
            <tr>
                <td><strong>الخصم:</strong></td>
                <td>{{ number_format($doc->discount, 2) }}</td>
            </tr>
            <tr>
                <td><strong>الصافي:</strong></td>
                <td><strong>{{ number_format($doc->net, 2) }}</strong></td>
            </tr>
        </table>
    </div>

    <div class="notes">
        <strong>ملاحظات:</strong><br>
        {{ $doc->notes ?? '-' }}
    </div>

    <div class="no-print" style="margin-top: 20px; text-align: center;">
        <button onclick="window.print()">طباعة الفاتورة</button>
    </div>
</div>

</body>
</html>
