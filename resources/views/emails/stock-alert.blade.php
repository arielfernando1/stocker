<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stock Alert</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        p {
            margin: 10px 0;
            font-size: 16px;
        }

        strong {
            color: #FF5733;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>Hola,</p>
        <p>Ya no quedan existencias del producto <strong>{{ $item->name }}</strong>.</p>
        <p>Por favor actualiza el inventario.</p>
        <p>Saludos,</p>
    </div>
</body>

</html>
