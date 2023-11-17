<?php




declare(strict_types= 1);



require __DIR__ ."/../../vendor/autoload.php";

use App\Controllers\{HomeController, AboutController};
use Framework\{App, Router};



$app = new App();

$app -> get('/', [HomeController::class, 'home']);
$app -> get('/about', [AboutController::class, 'about']);


// dd($app);

return $app;