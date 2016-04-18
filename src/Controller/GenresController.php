<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class GenresController extends AppController
{
    public function allGenres()
    {
        $genres = TableRegistry::get('Genres');
        $genres = $genres->find();
        $this->set([
            'genres' => $genres,
        ]);
    }
}
