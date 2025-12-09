<?php
// Test if we can read the image file
$imagePath = __DIR__ . '/images/urban-sneakers.jpg';

echo "<h1>Image Test</h1>";

if (file_exists($imagePath)) {
    echo "<p>File exists at: " . $imagePath . "</p>";
    echo "<p>File size: " . filesize($imagePath) . " bytes</p>";
    
    // Try to get image info
    $imageInfo = getimagesize($imagePath);
    if ($imageInfo) {
        echo "<p>Image dimensions: " . $imageInfo[0] . " x " . $imageInfo[1] . "</p>";
        echo "<p>Image type: " . $imageInfo['mime'] . "</p>";
    } else {
        echo "<p>Not a valid image file</p>";
    }
    
    // Try to display the image
    echo "<h2>Image Preview:</h2>";
    echo "<img src='images/urban-sneakers.jpg' style='max-width: 300px;' alt='Urban Sneakers'>";
} else {
    echo "<p>File does not exist at: " . $imagePath . "</p>";
    
    // List files in the images directory
    echo "<h2>Files in images directory:</h2>";
    $files = scandir(__DIR__ . '/images');
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<p>" . htmlspecialchars($file) . "</p>";
        }
    }
}
?>