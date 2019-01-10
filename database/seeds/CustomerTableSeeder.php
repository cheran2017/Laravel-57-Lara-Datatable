<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	echo "seeding customers data";

         factory(App\Customer::class, 30)->create();
    	echo "seeding completed";

    }
}
