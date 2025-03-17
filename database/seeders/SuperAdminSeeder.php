<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::create([
            'name'=>"super_admin",
            'email'=>"super@admin.com",
            'password'=>Hash::make("Pass@123")
            
            // You can add more fields here as per your requirement, for example, 'address', 'phone_number', etc.

            // Assign the 'super_admin' role to the newly created user.
            // You can use the Role model and its 'attachRole' method to assign roles to users.
            // For example: Role::find(1)->users()->attach($user);  // where 1 is the role_id

            // You can also use the 'assignRole' method provided by the User model to assign roles to users.
            // For example: $user->assignRole('super_admin');
            // Please note that the 'assignRole' method uses the 'attachRole' method internally.
            // You can use the 'attachRole' method directly if you want to attach multiple roles to a user.
            // For example: $user->attachRoles(['admin', 'editor']);  // where 'admin' and 'editor' are role_ids
            // You can also use the 'roles' method provided by the User model to get all roles assigned to a user.
            // For example: $user->roles()->pluck('name')->toArray();
            // Please note that the 'roles' method returns a collection of Role models, not an array of role names.
            // You can convert the collection to an array using the 'toArray' method if needed.
            // You can also use the 'roles' method provided by the User model to check if a user has a specific role.
            // For example: if ($user->hasRole('admin')) { /* User is an admin */ }       else if ($user->hasRole('editor           
        ]);

        $user->addRole('super_admin');
        $user->save();
    }
}
