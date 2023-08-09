<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();

use App\Controllers\HomepageController;
use App\Controllers\AdministrationController;

use App\Controllers\Post\PostController;
use App\Controllers\Post\PostsController;
use App\Controllers\Post\AddPostController;
use App\Controllers\Post\UpdatePostController;
use App\Controllers\Post\DeletePostController;

use App\Controllers\Comment\ApproveCommentController;
use App\Controllers\Comment\DeleteCommentController;

use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\LoginController;

use App\Entity\Post;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__.'/../templates');
$twig = new Environment($loader, [
        'cache' => false,
        'debug' => true,
    ]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// ROUTES 
if ($uriSegments[1] == null) {
    (new HomepageController($twig))->execute();
} 

elseif ($uriSegments[1] == 'post') {
    $id = intval($uriSegments[2]);
    $postController = new PostController($twig);
    $postController->execute($id);
} 

elseif ($uriSegments[1] == 'posts') {
    $postsController = new PostsController($twig);
    $postsController->execute();
} 

elseif ($uriSegments[1] == 'addPost') {
    (new AddPostController($twig))->execute();
} 

elseif ($uriSegments[1] == 'updatePost') {
    $id = intval($uriSegments[2]);
    (new UpdatePostController($twig))->execute($id);
} 

elseif ($uriSegments[1] == 'deletePost') {
    $id = intval($uriSegments[2]);
    (new DeletePostController($twig))->execute($id);
} 

elseif ($uriSegments[1] == 'contact') {
    (new HomepageController($twig))->sendEmail();
} 

elseif ($uriSegments[1] == 'register') {
    (new RegisterController($twig))->execute();
} 

elseif ($uriSegments[1] == 'login') {
    (new LoginController($twig))->login();
} 

elseif ($uriSegments[1] == 'logout') {
    (new LoginController($twig))->logout();
} 

elseif ($uriSegments[1] == 'administration') {
    (new AdministrationController($twig))->execute();
} 

elseif ($uriSegments[1] == 'approveComment') {
    $id = intval($uriSegments[2]);
    (new ApproveCommentController($twig))->execute($id);
} 

elseif ($uriSegments[1] == 'deleteComment') {
    $id = intval($uriSegments[2]);
    (new DeleteCommentController($twig))->execute($id);
} 

else {
    $twig->display('pages/error/index.html.twig');
}
