<?php

use yii\db\Migration;

/**
 * Handles the creation of table `proveedor`.
 */
class m180923_184604_create_proveedor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('proveedor', [
            'idproveedor' => $this->primaryKey(),
            'clave_proveedor' => $this->integer()->notNull(),
            'proveedor' => $this->string(80)->notNull(),
            'Correo' => $this->string(45),
            'telefono' => $this->string(45),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('proveedor');
    }
}
