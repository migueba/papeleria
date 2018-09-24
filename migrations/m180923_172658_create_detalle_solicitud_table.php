<?php

use yii\db\Migration;

/**
 * Handles the creation of table `detalle_solicitud`.
 */
class m180923_172658_create_detalle_solicitud_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('detalle_solicitud', [
            'iddetalle_solicitud' => $this->primaryKey(),
            'productos_idproductos' => $this->integer(),
            'solicitud_idsolicitud' => $this->integer(),
            'cantidad' => $this->integer()->notNull(),
            'unidad_medida_idunidad_medida' => $this->integer(),
            'detalle' => $this->string(60),
            'estatus' => "ENUM('Pendiente', 'Aprovada', 'Rechazada')",
        ]);

        // add foreign key for table `productos`
        $this->addForeignKey(
            'fk-detalle_solicitud-idproductos',
            'detalle_solicitud',
            'productos_idproductos',
            'productos',
            'idproductos',
            'CASCADE'
        );

        // add foreign key for table `solicitud`
        $this->addForeignKey(
            'fk-detalle_solicitud-idsolicitud',
            'detalle_solicitud',
            'solicitud_idsolicitud',
            'solicitud',
            'idsolicitud',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `productos`
        $this->dropForeignKey(
            'fk-detalle_solicitud-idproductos',
            'detalle_solicitud'
        );

        // drops foreign key for table `solicitud`
        $this->dropForeignKey(
            'fk-detalle_solicitud-idsolicitud',
            'detalle_solicitud'
        );

        $this->dropTable('detalle_solicitud');
    }
}
