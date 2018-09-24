<?php

use yii\db\Migration;

/**
 * Handles the creation of table `productos`.
 */
class m180923_165712_create_productos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('productos', [
            'idproductos' => $this->primaryKey(),
            'descripcion' => $this->string(80)->notNull(),
            'inv_inicial' => $this->integer(),
            'inv_final' => $this->integer(),
            'unidad_medida_idunidad_medida' => $this->integer(),
        ]);

      // add foreign key for table `unidad_medida`
      $this->addForeignKey(
          'fk-productos-idunidad_medida',
          'productos',
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
        // drops foreign key for table `unidad_medida`
        $this->dropForeignKey(
            'fk-productos-idunidad_medida',
            'productos'
        );

        $this->dropTable('productos');
    }
}
