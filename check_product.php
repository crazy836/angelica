<?php
require_once 'vendor/autoload.php';

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;

// Create a new container and set it as the static instance
$app = new Container();
Container::setInstance($app);

// Create a new event dispatcher and set it as the static instance
$events = new Dispatcher($app);
$app->instance('events', $events);

// Create a new Capsule instance
$capsule = new Capsule($app);
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// Setup the Eloquent ORM
$capsule->bootEloquent();

// Load the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Reconfigure the database connection with the loaded environment variables
$capsule->getDatabaseManager()->purge();
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'port' => $_ENV['DB_PORT'] ?? '3306',
    'database' => $_ENV['DB_DATABASE'] ?? 'forge',
    'username' => $_ENV['DB_USERNAME'] ?? 'forge',
    'password' => $_ENV['DB_PASSWORD'] ?? '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

// Query the product
try {
    $product = Capsule::table('products')->where('name', 'Urban Sneakers')->first();
    
    if ($product) {
        echo "Product found:\n";
        echo "Name: " . $product->name . "\n";
        echo "Cover Image: " . $product->cover_image . "\n";
    } else {
        echo "Product 'Urban Sneakers' not found in database.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>