<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    protected $roles = ['Admin', 'Director', 'East Africa GM', 'West Africa GM', 'Manager - Kenya', 'Manager - Tanzania', 'Manager - Uganda', 'Manager - Ghana', 'Manager - Nigeria', 'User - Kenya', 'User - Tanzania', 'User - Uganda', 'User - Ghana', 'User - Nigeria'];
    protected $permissions = ["Dashboard", "Leads", "Opportunities", "Accounts", "Contacts", "Activity Log", "Notes", "Machine Population", "Suppliers", "Sales Targets", "Reports & Analytics", "Admin Page", "Kenya", "Tanzania", "Uganda", "Ghana", "Nigeria"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $key1 => $value1){
            Permission::create(['name' => $value1]);
        }

        foreach ($this->roles as $key => $value){
            $role = Role::create(['name' => $value]);
            if($value == "Admin"){
                $permissions = Permission::all();
                $role->syncPermissions($permissions);
            }elseif($value == "Director"){
                $permissions = Permission::where("id", '<>', 12)->get();
                $role->givePermissionTo($permissions);
            }elseif($value == "East Africa GM"){
                $permissions = Permission::whereNotIn("id", [12,16,17])->get();
                $role->givePermissionTo($permissions);
            }elseif($value == "West Africa GM"){
                $permissions = Permission::whereNotIn("id", [12,13,14,15])->get();
                $role->givePermissionTo($permissions);
            }elseif(in_array($value,['Manager - Kenya', 'Manager - Tanzania', 'Manager - Uganda', 'Manager - Ghana', 'Manager - Nigeria'])){
                $permissions = Permission::whereNotIn("id", [12,13,14,15,16,17])->get();
                $role->givePermissionTo($permissions);
            }elseif($value == 'User - Kenya'){
                $permissions = Permission::whereNotIn("id", [11,12,14,15,16,17])->get();
                $role->givePermissionTo($permissions);
            }elseif($value == 'User - Tanzania'){
                $permissions = Permission::whereNotIn("id", [11,12,13,15,16,17])->get();
                $role->givePermissionTo($permissions);
            }elseif($value == 'User - Uganda'){
                $permissions = Permission::whereNotIn("id", [11,12,13,14,16,17])->get();
                $role->givePermissionTo($permissions);
            }elseif($value == 'User - Ghana'){
                $permissions = Permission::whereNotIn("id", [11,12,13,14,15,17])->get();
                $role->givePermissionTo($permissions);
            }elseif($value == 'User - Nigeria'){
                $permissions = Permission::whereNotIn("id", [11,12,13,14,15,16])->get();
                $role->givePermissionTo($permissions);
            }
        }
    }
}
