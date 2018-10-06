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
            'estatus' => "ENUM('Activo', 'Inactivo', 'Bloqueado')"
        ]);

        // insert for table `usuarios`
        $this->insert('usuarios',array(
           'username'=>'ADMINISTRA',
           'password' => md5('FMSYST123%'),
           'estatus' => 'Activo'
         ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usuarios');
    }
}
