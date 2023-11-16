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

    <p>Om deze registratie te accepteren of beheren, kun je inloggen op het beheerdersgedeelte van ons platform en de benodigde acties ondernemen:</p>
    <ol>
        <li>Log in als beheerder</li>
        <li>Bekijk het beheermodule</li>
        <li>Klik op Users in het menu</li>
        <li>Klik op roles van de nieuwe gebruiker</li>
        <li>Geef aan wat voor rol de nieuwe gebruiker mag hebben</li>
        <li>Klik op assign</li>
    </ol>
    
    <p>Vriendelijke groeten,<br> Onze verzamelaarsplatform</p>
</body>
</html>

