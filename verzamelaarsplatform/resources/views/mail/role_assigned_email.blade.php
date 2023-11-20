<!DOCTYPE html>
<html>
<head>
    <title>Rol toegewezen</title>
</head>
<body>
    <h1>Rol "{{ $role }}" toegewezen aan {{ $user->name }}</h1>
    
    <p>Beste {{ $user->name }}, </p>

    <p>Uw rol "{{ $role }}" is toegewezen aan u.</p>
    <p>U kunt nu inloggen en uw overzicht krijgt u te zien. Als er problemen voorkomen, neem dan contact op met een beheerder.</p>
    
    <p>Vriendelijke groeten,<br> Onze verzamelaarsplatform</p>
</body>
</html>
