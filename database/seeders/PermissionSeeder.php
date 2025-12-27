<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $menus = config('menu');
        $collectedPermissions = [];

        foreach ($menus as $menu) {
            $groupLabel = $menu['label'];

            // Hanya masukkan permission utama jika ada
            if (!empty($menu['permission'])) {
                $collectedPermissions[$menu['permission']] = $groupLabel;
            }

            // Ambil permission dari routes jika ada
            if (!empty($menu['routes']) && is_array($menu['routes'])) {
                foreach ($menu['routes'] as $route) {
                    if (!empty($route['permission'])) {
                        $collectedPermissions[$route['permission']] = $groupLabel;
                    }
                }
            }
        }


        // Masukkan ke DB tanpa duplikat
        foreach ($collectedPermissions as $permName => $group) {
            Permission::firstOrCreate(
                ['name' => $permName],
                ['groupby' => $group] // ubah jadi 'groupny' jika nama kolommu itu
            );
        }
    }
}
