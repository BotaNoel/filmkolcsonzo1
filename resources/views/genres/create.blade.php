<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Új műfaj hozzáadása</h1>
    <form method="POST" action="{{ route('genres.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Műfaj neve" required>
        <button type="submit">Mentés</button>
    </form>

</body>
</html>