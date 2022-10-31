<?php

use yii\db\Migration;

/**
 * Class m221026_115823_init_rbac
 */
class m221026_115823_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221026_115823_init_rbac cannot be reverted.\n";

        return false;
    }

    /*public function up()
    {

    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }*/
}
