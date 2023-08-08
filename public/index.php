<?php

session_start();
// $_SESSION['userRole'] = '';
// $_SESSION['loggedIn'] = false;

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomepageController;
use App\Controllers\AdministrationController;

use App\Controllers\Post\PostController;
use App\Controllers\Post\PostsController;
use App\Controllers\Post\AddPostController;
use App\Controllers\Post\UpdatePostController;
use App\Controllers\Post\DeletePostController;

use App\Controllers\Comment\ApproveCommentController;
use App\Controllers\Comment\DeleteCommentController;

use App\Controllers\Auth\SigninController;
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

try {
    if (!isset($_GET['action']) || ($_GET['action'] == '')) {
        (new HomepageController($twig))->execute();
    } elseif (($_GET['action']) === 'post' && isset($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        $postController = new PostController($twig);
        $postController->execute($id);
    } elseif (($_GET['action']) === 'posts') {
        $postsController = new PostsController($twig);
        $postsController->execute();
    } elseif (($_GET['action']) === 'addPost') {
        (new AddPostController($twig))->execute();
    } elseif (($_GET['action']) === 'updatePost' && isset($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        (new UpdatePostController($twig))->execute($id);
    } elseif (($_GET['action']) === 'deletePost' && isset($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        (new DeletePostController($twig))->execute($id);
    } elseif (($_GET['action']) === 'contact') {
        (new HomepageController($twig))->sendEmail();
    } elseif (($_GET['action']) === 'signin') {
        (new SigninController($twig))->execute();
    } elseif (($_GET['action']) === 'login') {
        (new LoginController($twig))->login();
    } elseif (($_GET['action']) === 'logout') {
        (new LoginController($twig))->logout();
    } elseif (($_GET['action']) === 'administration') {
        (new AdministrationController($twig))->execute();
    } elseif (($_GET['action']) === 'approveComment' && isset($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        (new ApproveCommentController($twig))->execute($id);
    } elseif (($_GET['action']) === 'deleteComment' && isset($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        (new DeleteCommentController($twig))->execute($id);
    } else {
        $twig->display('pages/error/index.html.twig', [
            'loggedIn' => $_SESSION['loggedIn'],
            'userRole' => $_SESSION['userRole']
        ]);
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}

// if ($_SERVER['REQUEST_URI'] === '/projet/public/') {
//     (new HomepageController($twig))->execute();
// } elseif (($_GET['action']) === 'post' && isset($_GET['id']) && $_GET['id'] > 0) {
//     $id = $_GET['id'];
//     $postController = new PostController($twig);
//     $postController->execute($id);
// } elseif ($_SERVER['REQUEST_URI'] === '/projet/public/posts') {
//     var_dump('haha');
//     $postsController = new PostsController($twig);
//     $postsController->execute();
// } elseif ($_SERVER['REQUEST_URI'] === '/projet/public/addPost') {
//     (new AddPostController($twig))->execute();
// } elseif (($_GET['action']) === 'updatePost' && isset($_GET['id']) && $_GET['id'] > 0) {
//     $id = $_GET['id'];
//     (new UpdatePostController($twig))->execute($id);
// } elseif (($_GET['action']) === 'deletePost' && isset($_GET['id']) && $_GET['id'] > 0) {
//     $id = $_GET['id'];
//     (new DeletePostController($twig))->execute($id);
// } elseif ($_SERVER['REQUEST_URI'] === '/projet/public/contact') {
//     (new HomepageController($twig))->sendEmail();
// } elseif ($_SERVER['REQUEST_URI'] === '/projet/public/signin') {
//     (new SigninController($twig))->execute();
// } elseif ($_SERVER['REQUEST_URI'] === '/projet/public/login') {
//     (new LoginController($twig))->login();
// } elseif ($_SERVER['REQUEST_URI'] === '/projet/public/logout') {
//     (new LoginController($twig))->logout();
// } elseif ($_SERVER['REQUEST_URI'] === '/projet/public/administration') {
//     (new AdministrationController($twig))->execute();
// } elseif (($_GET['action']) === 'approveComment' && isset($_GET['id']) && $_GET['id'] > 0) {
//     $id = $_GET['id'];
//     (new ApproveCommentController($twig))->execute($id);
// } elseif (($_GET['action']) === 'deleteComment' && isset($_GET['id']) && $_GET['id'] > 0) {
//     $id = $_GET['id'];
//     (new DeleteCommentController($twig))->execute($id);
// } else {
//     $twig->display('pages/error/index.html.twig', [
//         'loggedIn' => $_SESSION['loggedIn'],
//         'userRole' => $_SESSION['userRole']
//     ]);
// }
