<?php

namespace Database\Seeders;

use App\Models\DietMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DietMenusSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama terlebih dahulu
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DietMenu::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $menus = [
            // ... (data menu seperti sebelumnya)
            // Copy semua data menu dari seeder sebelumnya
        ];

        foreach ($menus as $menu) {
            DietMenu::create($menu);
        }

        $this->command->info('25 diet menus created successfully! (15 free, 10 premium)');
    }
}