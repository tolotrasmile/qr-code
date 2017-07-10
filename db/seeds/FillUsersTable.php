<?php

use Phinx\Seed\AbstractSeed;

class FillUsersTable extends AbstractSeed
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
        $users = [];

        for ($i = 0; $i < 20; ++$i) {

            $timestamp = $faker->unixTime('now');

            $users[] = [
                'username' => $faker->userName,
                'password' => $faker->password(40),
                'created_at' => date('Y-m-d H:i:s', $timestamp),
                'updated_at' => date('Y-m-d H:i:s', $timestamp)
            ];
        }
        $this->insert('users', $users);
    }
}
