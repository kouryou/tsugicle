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
        $this->table('users', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'uuid')
            ->addColumn('screen_name', 'string')
            ->addColumn('oauth_token', 'string')
            ->addColumn('oauth_token_secret', 'string')
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('threads')
            ->addColumn('user_id', 'uuid')
            ->addColumn('genre_id', 'integer')
            ->addColumn('title', 'string')
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('informations')
            ->addColumn('user_id', 'uuid')
            ->addColumn('thread_id', 'integer')
            ->addColumn('information', 'string', ['default' => null, 'limit' => 1000, 'null' =>false])
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('boards')
            ->addColumn('user_id', 'uuid')
            ->addColumn('thread_id', 'integer')
            ->addColumn('description', 'string')
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('genres')
            ->addColumn('title', 'string')
            ->create();

        $this->table('goods')
            ->addColumn('user_id', 'uuid')
            ->addColumn('board_id', 'integer')
            ->addColumn('good', 'boolean')
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('tsugicles')
            ->addColumn('user_id', 'uuid')
            ->addColumn('thread_id', 'integer')
            ->addColumn('tsugicle', 'boolean')
            ->addColumn('modified', 'datetime')
            ->addColumn('created', 'datetime')
            ->create();

        $this->table('rankings')
            ->addColumn('thread_id', 'integer')
            ->addColumn('tsugicle_sum', 'integer')
            ->addColumn('collection_time', 'datetime')
            ->create();

        $this->table('constants')
            ->addColumn('key_column', 'string')
            ->addColumn('value_column', 'string')
            ->create();
    }
}
