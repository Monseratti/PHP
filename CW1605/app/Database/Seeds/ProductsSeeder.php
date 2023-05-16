<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $data = [];
        for ($i=0; $i < 100; $i++) { 
            $data[$i] = ['title'=>$faker->title(),'price'=>$faker->numberBetween(1,20),'amount'=>$faker->numberBetween(1,20)];
        }
        $this->db->table('Products')->insertBatch($data);
    }
}
