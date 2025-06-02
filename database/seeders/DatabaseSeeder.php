<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            [
                'name' => 'Alvito',
                'email' => 'aldi.alvito2017@gmail.com',
                'password' => bcrypt('password'),
                'phone' => '08123456789',
                'poin' => 0,
            ],
        ]);
        
        DB::table('transport_types')->insert([
            [
                'name' => 'Trans Jakarta',
            ],
            [
                'name' => 'MRT',
            ],
            [
                'name' => 'KRL',
            ],
        ]);

        DB::table('vehicles')->insert([
            [
                'name' => 'AA',
                'plate_number' => '1234',
                'transport_type_id' => 3,
            ],
        ]);

        DB::table('stops')->insert([
            [
                'name' => 'Manggarai',
                'location' => 'Manggarai',
                'description' => 'Manggarai',
            ],
            [
                'name' => 'Pasar Senen',
                'location' => 'Pasar Senen',
                'description' => 'Pasar Senen',
            ],
            [
                'name' => 'Cikini',
                'location' => 'Cikini',
                'description' => 'Cikini',
            ],
            [
                'name' => 'Gondangdia',
                'location' => 'Gondangdia',
                'description' => 'Gondangdia',
            ],
        ]);

        DB::table('routes')->insert([
            [
                'name' => 'A1',
                'vehicle_id' => 1,
                'is_active' => true,
            ],
        ]);

        DB::table('route_stops')->insert([
            [
                'stop_id' => 1,
                'route_id' => 1,
                'stop_order' => 1,
                'estimated_time' => '01:00:00',
            ],
            [
                'stop_id' => 2,
                'route_id' => 1,
                'stop_order' => 2,
                'estimated_time' => '01:00:00',
            ],
            [
                'stop_id' => 3,
                'route_id' => 1,
                'stop_order' => 3,
                'estimated_time' => '01:00:00',
            ],
            [
                'stop_id' => 4,
                'route_id' => 1,
                'stop_order' => 4,
                'estimated_time' => '01:00:00',
            ],
        ]);

        DB::table('route_prices')->insert([
            [
                'route_id' => 1,
                'origin_stop_id' => 1,
                'destination_stop_id' => 2,
                'price' => 1000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 1,
                'destination_stop_id' => 3,
                'price' => 3000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 1,
                'destination_stop_id' => 4,
                'price' => 5000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 2,
                'destination_stop_id' => 1,
                'price' => 5000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 2,
                'destination_stop_id' => 3,
                'price' => 1000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 2,
                'destination_stop_id' => 4,
                'price' => 3000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 3,
                'destination_stop_id' => 1,
                'price' => 3000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 3,
                'destination_stop_id' => 2,
                'price' => 5000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 3,
                'destination_stop_id' => 4,
                'price' => 1000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 4,
                'destination_stop_id' => 1,
                'price' => 1000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 4,
                'destination_stop_id' => 2,
                'price' => 3000,
            ],
            [
                'route_id' => 1,
                'origin_stop_id' => 4,
                'destination_stop_id' => 3,
                'price' => 5000,
            ],
        ]);

        DB::table('rewards')->insert([
            [
                'name' => 'Shirt',
                'price' => 100,
                'description' => 'xxx',
            ],
        ]);

        DB::table('reward_exchanges')->insert([
            [
                'user_id' => 1,
                'reward_id' => 1,
                'exchanged_at' => '2025-06-02 13:48:45',
                'status' => 'exchanged',
            ],
        ]);

        DB::table('tickets')->insert([
            [
                'user_id' => 1,
                'transport_type_id' => 3,
                'pickup_stop_id' => 1,
                'dropoff_stop_id' => 3,
                'travel_date' => '2025-06-02',
                'used_at' => '2025-06-02 13:00:00',
                'status' => 'Used',
                'price' => 3000,
                'booked_at' => '2025-06-02 06:00:00',
            ],
        ]);
    }
}
