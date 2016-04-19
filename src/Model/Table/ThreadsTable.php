<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ThreadsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->belongsTo('Users');
    $this->belongsTo('Genres');
    $this->hasMany('Boards');
  }
}
