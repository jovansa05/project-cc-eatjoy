<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama terlebih dahulu (untuk menghindari duplicate)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        UserProfile::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // User Regular (Free)
        $userRegular = User::create([
            'username' => 'regular_user',
            'nickname' => 'John Regular',
            'email' => 'regular@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        UserProfile::create([
            'user_id' => $userRegular->id,
            'current_weight' => 85,
            'target_weight' => 70,
        ]);

        // User Premium Starter
        $userPremium = User::create([
            'username' => 'premium_user',
            'nickname' => 'Sarah Premium',
            'email' => 'premium@example.com',
            'password' => Hash::make('password123'),
            'role' => 'premium_starter',
        ]);

        UserProfile::create([
            'user_id' => $userPremium->id,
            'current_weight' => 78,
            'target_weight' => 65,
        ]);

        // User Premium Starter+
        $userPremiumPlus = User::create([
            'username' => 'premium_plus_user',
            'nickname' => 'Mike Premium+',
            'email' => 'premiumplus@example.com',
            'password' => Hash::make('password123'),
            'role' => 'premium_starter_plus',
        ]);

        UserProfile::create([
            'user_id' => $userPremiumPlus->id,
            'current_weight' => 92,
            'target_weight' => 75,
        ]);

        // User Admin (optional)
        $admin = User::create([
            'username' => 'admin',
            'nickname' => 'Admin EatJoy',
            'email' => 'admin@eatjoy.com',
            'password' => Hash::make('admin123'),
            'role' => 'premium_starter_plus',
        ]);

        UserProfile::create([
            'user_id' => $admin->id,
            'current_weight' => 70,
            'target_weight' => 70,
        ]);

        $this->command->info('Demo users created successfully!');
        $this->command->info('================================');
        $this->command->info('LOGIN CREDENTIALS:');
        $this->command->info('1. Regular User');
        $this->command->info('   Username: regular_user');
        $this->command->info('   Password: password123');
        $this->command->info('2. Premium Starter');
        $this->command->info('   Username: premium_user');
        $this->command->info('   Password: password123');
        $this->command->info('3. Premium Starter+');
        $this->command->info('   Username: premium_plus_user');
        $this->command->info('   Password: password123');
        $this->command->info('4. Admin');
        $this->command->info('   Username: admin');
        $this->command->info('   Password: admin123');
        $this->command->info('================================');
    }
}