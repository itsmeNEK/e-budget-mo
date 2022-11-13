<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
                'name'=> 'administrator',
                'username'=> 'administrator',
                'password'=> Hash::make('administrator'),
                'role'=> 6,
                'created_at'=> NOW(),
                'updated_at'=> NOW(),
            ],
        ];
        $this->user->insert($user);
    }
}
