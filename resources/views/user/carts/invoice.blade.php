<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Sewa Mobil</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 750px;
            margin: 30px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #f97316;
            font-size: 28px;
            margin-bottom: 5px;
        }
        .header p {
            margin: 3px 0;
            color: #555;
            font-size: 14px;
        }
        .info {
            margin-bottom: 25px;
        }
        .info p {
            margin: 4px 0;
            font-size: 16px;
        }
        .info p strong {
            color: #f97316;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px 10px;
            text-align: center;
            font-family: Arial, sans-serif;
            vertical-align: middle;
        }
        table th {
            background-color: #f97316;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
        }
        table td {
            font-size: 15px;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        @media print {
            body { margin: 0; padding: 0; }
            .container { box-shadow: none; margin: 0; border-radius: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Invoice Sewa Mobil</h1>
            <p>Tanggal: {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i') }}</p>
        </div>

        <div class="info">
            <p><strong>Nama Penyewa:</strong> {{ $order->customer_name }}</p>
            @if($order->customer_email)
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
            @endif
            @if($order->customer_phone)
                <p><strong>No. Telepon:</strong> {{ $order->customer_phone }}</p>
            @endif
        </div>

        <table>
            <thead>
                <tr>
                    <th>Mobil</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Hari</th>
                    <th>Driver</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($item['start_date'])->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item['end_date'])->format('d-m-Y') }}</td>
                    <td>{{ $item['days'] }}</td>
                    <td>{{ $item['with_driver'] ? 'Ya' : 'Tidak' }}</td>
                    <td>Rp {{ number_format($item['subtotal'],0,',','.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="total">Total Pembayaran: Rp {{ number_format($totalPrice,0,',','.') }}</p>

        <div class="footer">
            <p>© {{ date('Y') }} Bali Trans Rental Mobil. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>
