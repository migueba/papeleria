<?php

use yii\db\Migration;

/**
 * Handles the creation of table `solicitud`.
 */
class m180923_164949_create_solicitud_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('solicitud', [
          'idsolicitud' => $this->primaryKey(),
          'fecha_solicitud' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
          'estatus' => "ENUM('Aprovada', 'Rechazada', 'Pendiente', 'Cancelada', 'Proceso')",
          'usuarios_idusuario' => $this->integer(),
        ]);

        // add foreign key for table `usuarios`
        $this->addForeignKey(
            'fk-solicitud-idusuario',
            'solicitud',
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
            'fk-solicitud-idusuario',
            'solicitud'
        );

        $this->dropTable('solicitud');
    }
}
