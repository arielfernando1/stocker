<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $business->name }} - Receipt</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Monospace, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            font-size: 10px;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 10px;
            /*align text to center*/
            text-align: center;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;

        }

        td,
        th {
            padding: 5px;
        }

        tfoot {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h1>{{ $business->name }}</h1>
            <p>{{ $business->address }}</p>
            <p>Fecha: {{ $sale->created_at }}</p>
        </center>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Cant.</th>
                    <th>Detalle</th>
                    <th>V. Unit.</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sale->saleDetails as $detail)
                    <tr>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->item->name }}</td>
                        <td>${{ $detail->item->price }}</td>
                        <td>${{ $detail->total }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>${{ $sale->total }}</td>
                </tr>
            </tfoot>
        </table>
        <footer>
            <center>
                <p>Gracias por su compra!</p>
            </center>
        </footer>
    </div>
</body>

</html>
