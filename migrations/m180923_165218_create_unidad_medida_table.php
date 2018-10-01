<?php

use yii\db\Migration;

/**
 * Handles the creation of table `unidad_medida`.
 */
class m180923_165548_create_unidad_medida_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('unidad_medida', [
            'idunidad_medida' => $this->primaryKey(),
            'unidad_medida' => $this->string(45)->notNull(),
        ]);

        // insert for table `unidad_medida`
        $this->insert('unidad_medida',array(
          'unidad_medida' => 'Caja',
        ));

        // insert for table `unidad_medida`
        $this->insert('unidad_medida',array(
          'unidad_medida' => 'Pieza',
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('unidad_medida');
    }
}
