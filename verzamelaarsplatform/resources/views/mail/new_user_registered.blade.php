<!DOCTYPE html>
<html>
<head>
    <title>Nieuwe gebruiker registratie</title>
</head>
<body>
    <h1>Nieuwe gebruiker geregistreerd</h1>
    
    <p>Beste beheerder,</p>

    <p>Er is een nieuwe gebruiker geregistreerd op ons platform:</p>
    
    <ul>
        <li>Naam: {{ $data->name }}</li>
        <li>E-mail: {{ $data->email }}</li>
    </ul>

    <p>Om deze registratie te accepteren of beheren, kun je inloggen op het beheerdersgedeelte van ons platform en de benodigde acties ondernemen.</p>
    
    <p>Vriendelijke groeten,<br> Onze verzamelaarsplatform</p>
</body>
</html>

