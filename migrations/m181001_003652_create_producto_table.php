<?php

use yii\db\Migration;

/**
 * Handles the creation of table `producto`.
 */
class m181001_003652_create_producto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('producto', [
            'idproducto' => $this->primaryKey(),
            'descripcion' => $this->string(80)->notNull(),
            'inv_inicial' => $this->integer()->defaultValue(0),
            'inv_final' => $this->integer()->defaultValue(0),
            'unidad_medida_idunidad_medida' => $this->integer(),
            'precio' => $this->decimal(10,4)->defaultValue(0),
        ]);

        // add foreign key for table `unidad_medida`
        $this->addForeignKey(
            'fk-producto-idunidad_medida',
            'producto',
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
        // drops foreign key for table `user`
         $this->dropForeignKey(
             'fk-producto-idunidad_medida',
             'producto'
         );

        $this->dropTable('producto');
    }
}
