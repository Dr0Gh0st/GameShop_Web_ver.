<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        //code to restart yii rbac/init

        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // add "create..." permissions
        $createGame = $auth->createPermission('createGame');
        $createGame->description = 'Create a Game';
        $auth->add($createGame);

        $createFatura = $auth->createPermission('createFatura');
        $createFatura->description = 'Create a Fatura';
        $auth->add($createFatura);

        $createEncomenda = $auth->createPermission('createEncomenda');
        $createEncomenda->description = 'Create a Encomenda';
        $auth->add($createEncomenda);

        $createReview = $auth->createPermission('createReview');
        $createReview->description = 'Create a Review';
        $auth->add($createReview);

        // add "addnewitem..." permissions
        $addnewitemCarrinho = $auth->createPermission('addnewitemCarrinho');
        $addnewitemCarrinho->description = 'Add new item to Carrinho';
        $auth->add($addnewitemCarrinho);

        $addnewitemFatura = $auth->createPermission('addnewitemFatura');
        $addnewitemFatura->description = 'Add new item to Fatura';
        $auth->add($addnewitemFatura);

        $addnewitemEncomenda = $auth->createPermission('addnewitemEncomenda');
        $addnewitemEncomenda -> description = 'Add new item to Review';
        $auth->add($addnewitemEncomenda);

        // add "update..." permissions
        $updateGame = $auth->createPermission('updateGame');
        $updateGame -> description = 'Update Game';
        $auth->add($updateGame);

        $updateCarrinho = $auth->createPermission('updateCarrinho');
        $updateCarrinho -> description = 'Update Carrinho';
        $auth->add($updateCarrinho);

        $updateFatura = $auth->createPermission('updateFatura');
        $updateFatura->description = 'Update Fatura';
        $auth->add($updateFatura);

        $updateEncomenda = $auth->createPermission('updateEncomenda');
        $updateEncomenda -> description = 'Update Encomenda';
        $auth->add($updateEncomenda);

        $updateReview = $auth->createPermission('updateReview');
        $updateReview->description = 'Update Review';
        $auth->add($updateReview);

        //add "cancel..." permissions
        $cancelFatura = $auth->createPermission('cancelFatura');
        $cancelFatura->description = 'Cancel a Fatura';
        $auth->add($cancelFatura);

        $cancelEncomenda = $auth->createPermission('cancelEncomenda');
        $cancelEncomenda -> description = 'Cancel a Review';
        $auth->add($cancelEncomenda);

        $cancelReview = $auth->createPermission('cancelReview');
        $cancelReview->description = 'Cancel a Review';
        $auth->add($cancelReview);

        // add "delete..." permissions
        $deleteReview = $auth->createPermission('deleteReview');
        $deleteReview->description = 'Delete a Review';
        $auth->add($deleteReview);

        $deleteGame = $auth->createPermission('deleteGame');
        $deleteGame -> description = 'Delete a Game';
        $auth->add($deleteGame);

        // add roles and permissions
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createGame);
        $auth->addChild($admin, $updateGame);
        $auth->addChild($admin, $deleteGame);
        $auth->addChild($admin, $createReview);
        $auth->addChild($admin, $updateReview);
        $auth->addChild($admin, $cancelReview);
        $auth->addChild($admin, $deleteReview);
        $auth->addChild($admin, $createFatura);
        $auth->addChild($admin, $updateFatura);
        $auth->addChild($admin, $addnewitemFatura);
        $auth->addChild($admin, $cancelFatura);
        $auth->addChild($admin, $createEncomenda);
        $auth->addChild($admin, $addnewitemEncomenda);
        $auth->addChild($admin, $updateEncomenda);
        $auth->addChild($admin, $cancelEncomenda);
        $auth->addChild($admin, $addnewitemCarrinho);
        $auth->addChild($admin, $updateCarrinho);
        $auth->assign($admin, 1);

        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $createGame);
        $auth->addChild($funcionario, $updateGame);
        $auth->addChild($funcionario, $deleteGame);
        $auth->addChild($funcionario, $createReview);
        $auth->addChild($funcionario, $updateReview);
        $auth->addChild($funcionario, $cancelReview);
        $auth->addChild($funcionario, $deleteReview);
        $auth->addChild($funcionario, $createFatura);
        $auth->addChild($funcionario, $updateFatura);
        $auth->addChild($funcionario, $addnewitemFatura);
        $auth->addChild($funcionario, $cancelFatura);
        $auth->addChild($funcionario, $createEncomenda);
        $auth->addChild($funcionario, $addnewitemEncomenda);
        $auth->addChild($funcionario, $updateEncomenda);
        $auth->addChild($funcionario, $cancelEncomenda);
        $auth->addChild($funcionario, $addnewitemCarrinho);
        $auth->addChild($funcionario, $updateCarrinho);
        $auth->assign($funcionario, 2);

        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $createReview);
        $auth->addChild($cliente, $updateReview);
        $auth->addChild($cliente, $cancelReview);
        $auth->addChild($cliente, $deleteReview);
        $auth->addChild($cliente, $addnewitemCarrinho);
        $auth->addChild($cliente, $updateCarrinho);
        $auth->assign($cliente, 3);

        $clientedev = $auth->createRole('clientedev');
        $auth->add($clientedev);
        $auth->addChild($clientedev, $createGame);
        $auth->addChild($clientedev, $updateGame);
        $auth->addChild($clientedev, $deleteGame);
        $auth->addChild($clientedev, $createReview);
        $auth->addChild($clientedev, $updateReview);
        $auth->addChild($clientedev, $cancelReview);
        $auth->addChild($clientedev, $deleteReview);
        $auth->addChild($clientedev, $addnewitemCarrinho);
        $auth->addChild($clientedev, $updateCarrinho);
        $auth->assign($clientedev, 4);

        $guest = $auth->createRole('guest');
        $auth->add($guest);
        $auth->addChild($guest, $createReview);
        $auth->addChild($guest, $updateReview);
        $auth->assign($guest, 5);

    }
}