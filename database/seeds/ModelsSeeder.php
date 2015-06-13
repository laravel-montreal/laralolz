<?php

use Illuminate\Database\Seeder;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints

        DB::table('conferences')->truncate();
        DB::table('venues')->truncate();
        DB::table('outings')->truncate();
        DB::table('users')->truncate();

        $numberEntities = 5;
        $conferences = factory('App\Conference', $numberEntities)->create();
        $venues = factory('App\Venue', $numberEntities)->create();
        $users = factory('App\User', $numberEntities)->create();

        for ($i = 0; $i < $numberEntities; $i++) {
            $outings = $this->makeOutings($numberEntities, $users, $venues);
            $this->seedConferenceRelations($conferences[$i], $outings, $users[$i]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
    }

    private function makeOutings($numberEntities, $users, $venues)
    {
        $outings = factory('App\Outing', $numberEntities)->create();
        for ($i = 0; $i < $numberEntities; $i++) {
            $this->seedOutingRelations($outings[$i], $users[$i], $venues[$i]);
        }

        return $outings;
    }

    private function seedConferenceRelations($conference, $outings, $admin)
    {
        $conference->outings()->saveMany($outings);
        $conference->admin()->associate($admin);
    }

    private function seedOutingRelations($outing, $user, $venue)
    {
        $outing->admin()->associate($user);
        $outing->venue()->associate($venue);
    }
}
