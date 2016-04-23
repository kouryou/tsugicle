<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class BoardsTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Threads');
        $this->belongsTo('Users');
    }
}
