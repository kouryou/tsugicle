<?php
use Migrations\AbstractMigration;

class InitTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('user', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'uuid')
            ->addColumn('screen_name', 'string')
            ->addColumn('oauth_token', 'string')
            ->addColumn('oauth_token_secret', 'string')
            ->addColumn('modefied', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('thread')
            ->addColumn('user_id', 'uuid')
            ->addColumn('genre_id', 'integer')
            ->addColumn('title', 'string')
            ->addColumn('good', 'boolean')
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('board')
            ->addColumn('user_id', 'uuid')
            ->addColumn('genre_id', 'integer')
            ->addColumn('thread_id', 'integer')
            ->addColumn('good', 'boolean')
            ->addColumn('description', 'string')
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('genre')
            ->addColumn('title', 'string')
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();
    }
}
