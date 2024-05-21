<?php
namespace App\Modules\User\Database;

use Illuminate\Database\Seeder as SeederClass;

class Seeder extends SeederClass
{
    /**
     * Run the database seeds.
     php artisan db:seed --class="\App\Modules\User\Database\Seeder"
     */
    static $model = \App\Modules\User\Models\Model::class;
    public function run(): void
    {

        self::$model::truncate();
        for ($i = 1; $i < 100; $i++) {
        self::$model::create([
            'name' => facker()->name,
            'email' => facker()->name,
            'phone' => facker()->name,
            ]);
        }
    }
}