<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Alambron',
            'description' => 'Alambre conductor de electricidad de xx diametro',
        ]);
        DB::table('products')->insert([
            'name' => 'Conductor',
            'description' => 'Conductor de electricidad',
        ]);
        DB::table('products')->insert([
            'name' => 'Alambron / Conductor',
            'description' => 'Alambron y conductor',
        ]);
        DB::table('products')->insert([
            'name' => 'Gasoil',
            'description' => 'Combustible parael uso en la planta',
        ]);
        DB::table('products')->insert([
            'name' => 'Nitrogeno',
            'description' => 'Nitrogeno para el uso de la planta',
        ]);
        DB::table('products')->insert([
            'name' => 'Argon Liquido',
            'description' => 'Argon liquido para el uso de la planta',
        ]);
        DB::table('products')->insert([
            'name' => 'Aluminio (Materia prima)',
            'description' => 'Aluminio materia prima',
        ]);
        DB::table('products')->insert([
            'name' => 'Gas',
            'description' => 'Gas para uso en la planta',
        ]);
    }
}
