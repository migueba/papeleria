<?php

use yii\db\Migration;

/**
 * Handles the creation of table `proveedor`.
 */
class m180924_034913_create_proveedor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('proveedor', [
            'idproveedor' => $this->primaryKey(),
            'clave_proveedor' => $this->integer()->notNull()->unique(),
            'proveedor' => $this->string(80)->notNull(),
            'correo' => $this->string(45),
            'telefono' => $this->string(45),
            'estatus' => "ENUM('Activo', 'Inactivo')",
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
