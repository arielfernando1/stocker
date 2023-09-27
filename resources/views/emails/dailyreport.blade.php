<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
        }

        h1 {
            color: #333333;
            margin-top: 0;
        }

        p {
            color: #777777;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .total {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 4px;
            margin-top: 20px;
        }

        .total-label {
            font-weight: bold;
        }

        .total-value {
            color: #333333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hola,</h1>
        <p>Estas son las ganancias del dia de hoy</p>
        <div class="total">
            <span class="total-label">Total:</span>
            <span class="total-value">{{ $today }}</span>
        </div>
        <h2>Detalles:</h2>
        <table>
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Item</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->created_at }}</td>
                        <td>{{ $sale->item->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer>
        <p>Stocker v1.0</p>
    </footer>
</body>
</html>
