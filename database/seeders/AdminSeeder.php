<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new User();
        $admin->name = "Han Solo";
        $admin->email = "hansolo@gmail.com";
        $admin->password = "falcon";
        $admin->save();
    }
}
