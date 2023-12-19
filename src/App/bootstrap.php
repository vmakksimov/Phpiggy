<?php

declare(strict_types= 1);

require __DIR__ ."/../../vendor/autoload.php";

use Framework\App;
use function App\Config\{registerRoutes, registerMiddleware};
use App\Config\Paths;
use Dotenv\Dotenv;

$app = new App(Paths::SOURCE . "app/container-definitions.php");
$dotenv = Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

registerRoutes($app);
registerMiddleware($app);
// dd($app);

return $app;