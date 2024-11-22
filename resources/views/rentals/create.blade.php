<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{ $film->title }} kölcsönzése</h1>
    
    <p>Rendező: {{ $film->director }}</p>
    <p>Műfaj: {{ $film->genre->name }}</p>
    <p>Megjelenés éve: {{ $film->release_year }}</p>
    
    <form method="POST" action="{{ route('rentals.store') }}">
        @csrf
        <input type="hidden" name="film_id" value="{{ $film->id }}">
        
        <label for="renter_name">Kölcsönző neve:</label>
        <input type="text" id="renter_name" name="renter_name" required>
        <br>
    
        <label for="rental_date">Kölcsönzés dátuma:</label>
        <input type="date" id="rental_date" name="rental_date" required>
        <br>
    
        <button type="submit">Kölcsönzés indítása</button>
    </form>

</body>
</html>