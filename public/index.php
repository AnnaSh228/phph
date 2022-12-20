        <?php
        require_once '../vendor/autoload.php';
        require_once "../framework/autoload.php";
        require_once "../controllers/MainController.php"; 
        require_once "../controllers/Controller404.php"; 
        require_once "../controllers/ObjectController.php";
        require_once "../controllers/SearchController.php";
        require_once "../controllers/CatObjectCreateController.php";
        require_once "../controllers/TypeCreateController.php";
        require_once "../controllers/DeleteController.php";
        require_once "../controllers/UpdateController.php";
        require_once "../middlewares/LoginRequiredMiddleware.php";
        require_once "../controllers/LoginController.php";
        require_once "../controllers/LogoutController.php";
        session_set_cookie_params(60*60*10);
        session_start(); 

        
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO('mysql:host=localhost;dbname=cats;charset=utf8', 'root', '');
$router = new Router($twig, $pdo);

$router->add("/login", LoginController::class);
$router->add("/logout", LogoutController::class);
$router->add("/", MainController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/cat-object/(?P<id>\d+)", ObjectController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/search", SearchController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/create", CatObjectCreateController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/createtype", TypeCreateController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/cat-object/(?P<id>\d+)/delete", DeleteController::class)->middleware(new LoginRequiredMiddleware());
$router->add("/cat-object/(?P<id>\d+)/edit", UpdateController::class)->middleware(new LoginRequiredMiddleware());

$router->get_or_default(Controller404::class);