<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo di Contatto</title>
</head>
<body>
    <h3>Contatto fatto dal formulario</h3>
    <p><strong>Nome:</strong> {{ $data['name'] }}</p>
    <p><strong>Telefono:</strong> {{ $data['phone'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Messaggio:</strong> {{ $data['message'] }}</p>
</body>
</html>
