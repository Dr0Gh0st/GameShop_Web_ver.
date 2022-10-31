<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // add "createComment" permission
        $createComment = $auth->createPermission('createComment');
        $createComment->description = 'Create a Comment';
        $auth->add($createComment);

        // add "updateUser" permission
        $updateComment = $auth->createPermission('updateComment');
        $updateComment->description = 'Update Comment';
        $auth->add($updateComment);

        // add "admin" role and give this role the "createUser" permission and "updateUser" permission
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createComment);
        $auth->addChild($admin, $updateComment);
        $auth->assign($admin, 1);

        $funcionario = $auth->createRole('funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $createComment);
        $auth->addChild($funcionario, $updateComment);
        $auth->assign($funcionario, 2);

        $cliente = $auth->createRole('cliente');
        $auth->add($cliente);
        $auth->addChild($cliente, $createComment);
        $auth->addChild($cliente, $updateComment);
        $auth->assign($cliente, 3);

        $clientedev = $auth->createRole('clientedev');
        $auth->add($clientedev);
        $auth->addChild($clientedev, $createComment);
        $auth->addChild($clientedev, $updateComment);
        $auth->assign($clientedev, 4);
    }
}