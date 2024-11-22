<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Folyamatban lévő kölcsönzések</h1>

    <table>
        <thead>
            <tr>
                <th>Film címe</th>
                <th>Kölcsönző neve</th>
                <th>Kölcsönzés dátuma</th>
                <th>Visszavétel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->film->title }}</td>
                    <td>{{ $rental->renter_name }}</td>
                    <td>{{ $rental->rental_date }}</td>
                    <td>
                        <form method="POST" action="{{ route('rentals.update', $rental->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="date" name="return_date" required>
                            <button type="submit">Visszahozás</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>