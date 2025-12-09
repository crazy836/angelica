<?php
// Test image path construction
$imageFileName = 'Urban Street Tee.jpg';
$fullPath = 'images/' . $imageFileName;
$publicPath = __DIR__ . '/' . $fullPath;
$assetPath = '/images/Urban Street Tee.jpg';

echo "<h1>Image Path Test</h1>";
echo "<p>Image file name: " . htmlspecialchars($imageFileName) . "</p>";
echo "<p>Full path: " . htmlspecialchars($fullPath) . "</p>";
echo "<p>Public path: " . htmlspecialchars($publicPath) . "</p>";
echo "<p>Asset path: " . htmlspecialchars($assetPath) . "</p>";
echo "<p>File exists: " . (file_exists($publicPath) ? 'Yes' : 'No') . "</p>";

// Try to display the image using the asset helper approach
echo "<h2>Image using asset() helper:</h2>";
echo "<img src='" . htmlspecialchars($assetPath) . "' style='max-width: 300px;' alt='Urban Street Tee'>";

// Try direct path
echo "<h2>Image using direct path:</h2>";
echo "<img src='/images/Urban Street Tee.jpg' style='max-width: 300px;' alt='Urban Street Tee'>";