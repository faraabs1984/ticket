<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole        = Role::create(['name' => 'Admin']);
        $adminPermissions = [
            'manage-users',
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            'lang-manage',
            'lang-change',
            'manage-tickets',
            'create-tickets',
            'edit-tickets',
            'delete-tickets',
            'manage-category',
            'create-category',
            'edit-category',
            'delete-category',
            'reply-tickets',
            'manage-setting',
            'manage-faq',
            'create-faq',
            'edit-faq',
            'delete-faq',
            'manage-knowledge',
            'create-knowledge',
            'edit-knowledge',
            'delete-knowledge',
            'manage-knowledgecategory',
            'create-knowledgecategory',
            'edit-knowledgecategory',
            'delete-knowledgecategory'
        ];
        foreach($adminPermissions as $ap)
        {
            $permission = Permission::create(['name' => $ap]);
            $adminRole->givePermissionTo($permission);
        }
        $adminUser = User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('1234'),
            ]
        );
        $adminUser->assignRole($adminRole);

        $agentRole        = Role::create(['name' => 'Agent']);
        $agentPermissions = [
            'view-users',
            'lang-change',
            'manage-tickets',
            'create-tickets',
            'edit-tickets',
            'reply-tickets',
        ];
        foreach($agentPermissions as $ep)
        {
            $permission = Permission::firstOrCreate(['name' => $ep]);
            $agentRole->givePermissionTo($permission);
        }
        $editorUser = User::create(
            [
                'name' => 'Agent',
                'email' => 'agent@example.com',
                'password' => Hash::make('1234'),
                'parent' => 1,
            ]
        );
        $editorUser->assignRole($agentRole);
    }
}
