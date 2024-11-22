<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Új film hozzáadása</h1>
    
    <form method="POST" action="{{ route('films.store') }}">
        @csrf
        <label for="title">Film címe:</label>
        <input type="text" id="title" name="title" placeholder="Film címe" required>
        <br>
    
        <label for="director">Rendező:</label>
        <input type="text" id="director" name="director" placeholder="Rendező neve" required>
        <br>
    
        <label for="genre">Műfaj:</label>
        <select id="genre" name="genre_id" required>
            <option value="">Válassz műfajt</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
        <br>
    
        <label for="release_year">Megjelenés éve:</label>
        <input type="number" id="release_year" name="release_year" placeholder="YYYY" required>
        <br>
    
        <button type="submit">Mentés</button>
    </form>

</body>
</html>