<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>


<body>

    <div>

        <h2>L'utente {{ $user->name }} ha chiesto di diventare revisore</h2>
        <h4>Ecco tutti i suoi dati</h4>
        <ul>
            <li>Nome: {{ $user->name }}</li>
            <li>Email: {{ $user->email }}</li>
            <li>Registrato il: {{ $user->created_at }}</li>
        </ul>

        <p>Per favore, clicca sul link qui sotto per confermare:</p>
        <a href="{{ route('make.revisor', compact('user')) }}">Rendi revisore</a>

    </div>

</body>


</html>