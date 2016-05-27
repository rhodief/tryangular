<?php
use Phinx\Seed\AbstractSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
            'title' => 'Primeiro Seeded Post no Blog',
            'body' => 'Este é um primeiro post no blog. Trata-se do conteúdo',
            'created' => 'NOW()',
            'modified' => 'NOW()'
            ],
            [
            'title' => 'Segundo Seeded Post no Blog',
            'body' => 'Este é um primeiro post no blog. Trata-se do conteúdo',
            'created' => 'NOW()',
            'modified' => 'NOW()'
            ]
        );

        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}
