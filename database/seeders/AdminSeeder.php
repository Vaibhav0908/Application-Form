<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['id' => 2],
            [
                'username' => 'Sam',
                'email' => 'sam12@gmail.com',
                'password' => Hash::make('Sam12345'),
                'admin_logo' => 'c:\Users\DELL\Pictures\stylish-barber-shop-logo-featuring-a-dashing-man-with-a-beard-and-mustache-vector.jpg',
            ]
        );
    }
}