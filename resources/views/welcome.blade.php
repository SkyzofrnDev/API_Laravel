<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Detail Film</title>
</head>
<body style="font-family: sans-serif; max-width:600px; margin:20px auto;">
    <h1>Detail Film via OMDb API</h1>

    @if (session('error'))
        <div style="padding:10px; background:#fdd; border:1px solid #f99; margin-bottom:16px;">
            {{ session('error') }}
        </div>
    @endif

    @if (empty($movie) || ($movie['Response'] ?? 'False') === 'False')
        <p>Tidak ada data film ditemukan.</p>
    @else
        <h2>{{ $movie['Title'] ?? '—' }} ({{ $movie['Year'] ?? '—' }})</h2>
        <p><strong>Genre:</strong> {{ $movie['Genre'] ?? '—' }}</p>
        <p><strong>Direktur:</strong> {{ $movie['Director'] ?? '—' }}</p>
        <p><strong>Plot:</strong> {{ $movie['Plot'] ?? '—' }}</p>
        @if (!empty($movie['Poster']) && $movie['Poster'] !== 'N/A')
            <p><img src="{{ $movie['Poster'] }}" alt="Poster {{ $movie['Title'] }}" style="max-width:100%;"></p>
        @endif
        <p><strong>IMDb Rating:</strong> {{ $movie['imdbRating'] ?? '—' }}</p>
        <p><strong>Actors:</strong> {{ $movie['Actors'] ?? '—' }}</p>
    @endif

</body>
</html>
