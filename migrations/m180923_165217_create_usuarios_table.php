<?php

use yii\db\Migration;

/**
 * Handles the creation of table `usuarios`.
 */
class m180923_165217_create_usuarios_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuarios', [
            'idusuario' => $this->primaryKey(),
            'username' => $this->string(45)->notNull(),
            'password' => $this->string(245)->notNull(),
            'estatus' => "ENUM('Activo', 'Inactivo', 'Bloqueado')",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usuarios');
    }
}
