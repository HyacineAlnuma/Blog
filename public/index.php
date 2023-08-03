<?php


require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomepageController;
use App\Controllers\AdministrationController;

use App\Controllers\Post\PostController;
use App\Controllers\Post\PostsController;
use App\Controllers\Post\AddPostController;
use App\Controllers\Post\UpdatePostController;
use App\Controllers\Post\DeletePostController;

use App\Controllers\Auth\SigninController;

use App\Entity\Post;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__.'/../templates');
$twig = new Environment($loader, array(
        'cache' => false,
        'debug' => true,
    ));

$twig->addExtension(new \Twig\Extension\DebugExtension());

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
            (new AddPostController($twig))->execute();
        } elseif (($_GET['action']) === 'updatePost') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                (new UpdatePostController($twig))->execute($id);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif (($_GET['action']) === 'deletePost') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                (new DeletePostController($twig))->execute($id);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif (($_GET['action']) === 'contact') {
            if (!$_POST) {
                header("Location: index.php");
            } else {
                (new HomepageController($twig))->sendEmail($_POST);
            }
        } elseif (($_GET['action']) === 'signin') {
            (new SigninController($twig))->execute();
        } elseif (($_GET['action']) === 'administration') {
            (new AdministrationController($twig))->execute();
        } elseif (($_GET['action']) === 'addComment') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $inputs = $_POST;
                (new AddCommentController($twig))->execute($id, $inputs);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
    } else {
        (new HomepageController($twig))->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}
