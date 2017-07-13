<?php

use Phinx\Seed\AbstractSeed;

class FillDocumentsTable extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $this->table('users')->truncate();

        $faker = \Faker\Factory::create();
        $documents = [];

        for ($i = 0; $i < 20; ++$i) {

            $timestamp = $faker->unixTime('now');

            $documents[] = [
                'number' => rand(1, 1000),
                'name' => $faker->sentence(20),
                'type' => rand(1, 3),
                'link' => $faker->slug(3),
                'created_at' => date('Y-m-d H:i:s', $timestamp),
                'updated_at' => date('Y-m-d H:i:s', $timestamp)
            ];
        }
        $this->insert('documents', $documents);
    }
}
