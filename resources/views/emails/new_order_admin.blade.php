<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Baru - Bali Trans</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        h2 {
            color: #f97316;
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
        }
        li {
            font-size: 16px;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        li strong {
            color: #f97316;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }
        .btn {
            display: inline-block;
            background-color: #f97316;
            color: #fff !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 15px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #e06b13;
        }
        @media screen and (max-width: 480px) {
            .container {
                padding: 20px;
            }
            h2 {
                font-size: 20px;
            }
            p, li {
                font-size: 14px;
            }
            .btn {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pesanan Baru Masuk</h2>
        <p>Pesanan baru telah diterima dengan detail berikut:</p>
        <ul>
            <li><strong>Nama Penyewa:</strong> {{ $order->customer_name }}</li>
            @if($order->customer_email)
                <li><strong>Email:</strong> {{ $order->customer_email }}</li>
            @endif
            @if($order->customer_phone)
                <li><strong>No. Telepon:</strong> {{ $order->customer_phone }}</li>
            @endif
            <li><strong>Total Pembayaran:</strong> Rp {{ number_format($totalPrice,0,',','.') }}</li>
        </ul>

        @if(isset($invoicePath))
            <p style="text-align:center;">
                <a href="{{ $invoicePath }}" class="btn" target="_blank">Lihat Invoice</a>
            </p>
        @endif

        <div class="footer">
            <p>© {{ date('Y') }} Bali Trans Rental Mobil. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>
