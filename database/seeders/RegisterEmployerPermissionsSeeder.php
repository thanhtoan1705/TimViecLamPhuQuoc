<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterEmployerPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($userId = null)
    {
        // Tìm kiếm hoặc tạo role 'Employer'
        $employerRole = Role::firstOrCreate([
            'name' => 'employer',
            'guard_name' => 'web',
        ]);

        // Lấy tất cả quyền hiện có
        $permissions = Permission::all();

        // Gán tất cả quyền cho role Employer
        $employerRole->syncPermissions($permissions);

        if ($userId) {
            // Gán quyền cho user có id là $userId
            $employer = User::find($userId);
            if ($employer && !$employer->hasRole('employer')) {
                $employer->assignRole($employerRole);
            }
        }
    }

}
