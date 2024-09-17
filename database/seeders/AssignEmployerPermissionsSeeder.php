<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignEmployerPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
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

        // Gán quyền cho tất cả các user có role là 'employer'
        $employers = User::where('role', 'employer')->get();

        foreach ($employers as $employer) {
            $employer->assignRole($employerRole);
        }
    }
}
