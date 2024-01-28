<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // $user=\App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => '123456789',
        //     'role' => 'Admin',       
        // ]);
        // $user2=\App\Models\User::factory()->create([
        //     'name' => 'Nayef',
        //     'email' => 'Nayef@example.com',
        //     'password' => '123456789',
        //     'role' => 'User',       
        // ]);$user3=\App\Models\User::factory()->create([
        //     'name' => 'Saad',
        //     'email' => 'Saad@example.com',
        //     'password' => '123456789',
        //     'role' => 'Manager',       
        // ]);
        // $point=\App\Models\Point::factory()->create([
        //     'name' => 'Saqeet',
        //     'country' => 'Syria',
        //     'address' => 'Azaz/city-center',
        //     'current_balance' => '10000',
        //     'manager_id'=>'3'     
        // ]);
        // $point2=\App\Models\Point::factory()->create([
        //     'name' => 'Al-Haffar',
        //     'country' => 'Syria',
        //     'address' => 'Tal-refat/city-center',
        //     'current_balance' => '50000',  
        //     'manager_id'=>'1'     
        // ]); 
        // $point3=\App\Models\Point::factory()->create([
        //     'name' => 'Greer',
        //     'country' => 'Syria',
        //     'address' => 'Aleppo/city-center',
        //     'current_balance' => '15000',   
        //     'manager_id'=>'1'      
        // ]);
        $arc1=\App\Models\T_Archive::factory()->create([
            'sender_id' => '2',
            'receiver_id' => '1',
            'total_amount' => '0',
            'un_number' => '0001', 
            'status'=>'done',
            'user_id'=>'1' ,
            'deleted'=>'0'     

        ]);
        $arc2=\App\Models\T_Archive::factory()->create([
            'sender_id' => '1',
            'receiver_id' => '3',
            'total_amount' => '0',
            'un_number' => '0002', 
            'status'=>'done',
            'user_id'=>'2' ,
            'deleted'=>'0'     
        ]);
    }
}
