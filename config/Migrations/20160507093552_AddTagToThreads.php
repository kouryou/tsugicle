<?php
use Migrations\AbstractMigration;

class AddTagToThreads extends AbstractMigration
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
        $table = $this->table('threads');
        $table->addColumn('tag', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
