<?php

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    public function disableForeignKeys()
    {
        if ($this->isSqLite()) {
            DB::statement('PRAGMA foreign_keys = OFF');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }
    }

    public function enableForeignKeys()
    {
        if ($this->isSqLite()) {
            DB::statement('PRAGMA foreign_keys = ON');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }

    private function isSqLite()
    {
        return Config::get('database.default') === 'sqlite';
    }
}
