<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class GenresTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('Threads');
    }
}
