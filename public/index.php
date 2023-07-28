<?php


require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\PostController;
use App\Controllers\PostsController;
use App\Controllers\AddPostController;
use App\Entity\Post;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__.'/../templates');
$twig = new Environment($loader);

try {
    if (isset($_GET['action']) && ($_GET['action'] !== '')) {
        if (($_GET['action']) === 'post') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $postController = new PostController($twig);
                $postController->execute($id);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif (($_GET['action']) === 'posts') {
            $postsController = new PostsController($twig);
            $postsController->execute();
        } elseif (($_GET['action']) === 'addPost') {
            (new AddPostController($twig))->execute($_POST);
        }
    } else {
        echo 'Non';
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}
