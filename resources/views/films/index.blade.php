<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Elérhető filmek</h1>
    
    <form method="GET" action="{{ route('films.index') }}">
        <input type="text" name="title" placeholder="Film címe">
        <input type="text" name="director" placeholder="Rendező neve">
        <input type="text" name="release_year" placeholder="Megjelenés éve">
        <button type="submit">Szűrés</button>
    </form>
    
    <table>
        <thead>
            <tr>
                <th>Cím</th>
                <th>Rendező</th>
                <th>Megjelenés éve</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
                <tr>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->director }}</td>
                    <td>{{ $film->release_year }}</td>
                    <td>
                        <a href="{{ route('rentals.create', $film->id) }}">Kölcsönzés</a>
                        <form method="POST" action="{{ route('films.destroy', $film->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Törlés</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>