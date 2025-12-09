<?php
// Test if we can read the Urban Street Tee image file
$imagePath = __DIR__ . '/images/Urban Street Tee.jpg';

echo "<h1>Urban Street Tee Image Test</h1>";

if (file_exists($imagePath)) {
    echo "<p>File exists at: " . $imagePath . "</p>";
    
    // Try to display the image
    echo "<h2>Image Preview:</h2>";
    echo "<img src='images/Urban Street Tee.jpg' style='max-width: 300px;' alt='Urban Street Tee'>";
} else {
    echo "<p>File does not exist at: " . $imagePath . "</p>";
    
    // List all files in the images directory
    echo "<h2>Files in images directory:</h2>";
    $files = scandir(__DIR__ . '/images');
    echo "<ul>";
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<li>" . htmlspecialchars($file) . "</li>";
        }
    }
    echo "</ul>";
}