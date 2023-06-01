<?php
use app\rbac\RbacManager;
use yii\db\Migration;

/**
 * Class m230601_104140_rbac_init
 */
class m230601_104140_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        RbacManager::init();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230601_104140_rbac_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230601_104140_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
