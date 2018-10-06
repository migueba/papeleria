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

        // insert for table `unidad_medida`
        $this->insert('proveedor',array(
          'clave_proveedor' => '200000',
          'proveedor' => 'Proveedor de Prueba',
          'correo' => 'prueba@pruebas.com',
          'telefono' => '222-22-2-22-22',
          'estatus' => 'Activo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('proveedor');
    }
}
