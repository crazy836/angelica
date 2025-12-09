<!DOCTYPE html>
<html>
<head>
    <title>Image Test</title>
</head>
<body>
    <h1>Testing Image Display</h1>
    
    <h2>Using asset() helper:</h2>
    <img src="{{ asset('images/urban-sneakers.jpg') }}" alt="Urban Sneakers" style="max-width: 300px;">
    
    <h2>Direct path:</h2>
    <img src="/images/urban-sneakers.jpg" alt="Urban Sneakers" style="max-width: 300px;">
    
    <h2>File existence check:</h2>
    @if(file_exists(public_path('images/urban-sneakers.jpg')))
        <p>File exists!</p>
    @else
        <p>File does not exist!</p>
    @endif
    
    <h2>Public path:</h2>
    <p>{{ public_path('images/urban-sneakers.jpg') }}</p>
</body>
</html>