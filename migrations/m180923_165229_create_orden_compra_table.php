<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orden_compra`.
 */
class m180923_163448_create_orden_compra_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orden_compra', [
          'idorden_compra' => $this->primaryKey(),
          'fecha' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
          'estatus' => "ENUM('Pendiente', 'Cancelada', 'Proceso')",
          'usuarios_idusuario' => $this->integer(),
        ]);

        // add foreign key for table `usuarios`
        $this->addForeignKey(
            'fk-orden_compra-idusuario',
            'orden_compra',
            'usuarios_idusuario',
            'usuarios',
            'idusuario',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `usuarios`
        $this->dropForeignKey(
            'fk-orden_compra-idusuario',
            'orden_compra'
        );

        $this->dropTable('orden_compra');
    }
}
