<?php

use yii\db\Schema;
use yii\db\Migration;

class m150413_121138_add_thumb_column extends Migration
{
    public function up()
    {
        $this->addColumn('realty', 'thumb', Schema::TYPE_TEXT);
    }

    public function down()
    {
       $this->dropColumn('realty', 'thumb');
    }
}
