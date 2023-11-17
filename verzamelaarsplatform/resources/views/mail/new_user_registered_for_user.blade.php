<!DOCTYPE html>
<html>
<head>
    <title>Geregistreerd voor verzamelaarsplatform</title>
</head>
<body>
    <h1>Geregistreerd voor verzamelaarsplatform</h1>

    <p>Beste {{ $data->name }},</p>

    <p>U heeft geregistreerd op onze platform met de onderstaande gegevens:</p>

    <ul>
        <li>Naam: {{ $data->name }}</li>
        <li>E-mail: {{ $data->email }}</li>
    </ul>

    <p>Om te kunnnen inloggen is er een e-mail gestuurd naar de beheerder om uw verzoek te kunnen accepteren.</p>
    <p>Voorlopig kunt u wel inloggen maar u kunt nog niets, wanneer u wordt geaccepteerd als gebruiker word hierop een vervolg mail gestuurd.</p>

    <p>Vriendelijke groeten,<br> Onze verzamelaarsplatform</p>
</body>
</html>

