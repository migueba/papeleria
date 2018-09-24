<?php

use yii\db\Migration;

/**
 * Handles the creation of table `detalle_orden_compra`.
 */
class m180923_173609_create_detalle_orden_compra_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('detalle_orden_compra', [
            'iddetalle_orden_compra' => $this->primaryKey(),
            'productos_idproductos' => $this->integer(),
            'orden_compra_idorden_compra' => $this->integer(),
            'cantidad' => $this->integer(),
            'unidad_medida_idunidad_medida' => $this->integer(),
            'detalle_orden' => $this->string(60),
            'estatus' => "ENUM('Pendiente', 'Aprovada', 'Rechazada')",
        ]);

        // add foreign key for table `productos`
        $this->addForeignKey(
            'fk-detalle_orden_compra-idproductos',
            'detalle_orden_compra',
            'productos_idproductos',
            'productos',
            'idproductos',
            'CASCADE'
        );

        // add foreign key for table `orden_compra`
        $this->addForeignKey(
            'fk-detalle_orden_compra-idorden_compra',
            'detalle_orden_compra',
            'orden_compra_idorden_compra',
            'orden_compra',
            'idorden_compra',
            'CASCADE'
        );

        // add foreign key for table `unidad_medida`
        $this->addForeignKey(
            'fk-detalle_orden_compra-idunidad_medida',
            'detalle_orden_compra',
            'unidad_medida_idunidad_medida',
            'unidad_medida',
            'idunidad_medida',
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
            'fk-detalle_orden_compra-idproductos',
            'detalle_orden_compra'
        );

        // drops foreign key for table `solicitud`
        $this->dropForeignKey(
            'fk-detalle_orden_compra-idorden_compra',
            'detalle_orden_compra'
        );

        // drops foreign key for table `solicitud`
        $this->dropForeignKey(
            'fk-detalle_orden_compra-idunidad_medida',
            'detalle_orden_compra'
        );

        $this->dropTable('detalle_orden_compra');
    }
}
