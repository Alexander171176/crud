<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class RoleSeeder extends Seeder
{
    /**
     * Вводим роль администратора.
     * createRole()Метод принимает два аргумента: перечисление, которое RoleName мы определили ранее.
     * createAdminRole() Метод запрашивает все разрешения, начинающиеся с user.
     * ИЛИ system., и передает их RoleName методу createRole().
     * Мы разрешаем пользователю-администратору выполнять все доступные действия с моделями
     */
    public function run(): void
    {
        $this->createAdminRole();
    }

    protected function createRole(RoleName $role, Collection $permissions): void
    {
        $newRole = Role::create(['name' => $role->value]);
        $newRole->permissions()->sync($permissions);
    }

    protected function createAdminRole(): void
    {
        $permissions = Permission::query()
            ->where('name', 'like', 'user.%')
            ->orWhere('name', 'like', 'system.%')
            ->pluck('id');

        $this->createRole(RoleName::ADMIN, $permissions);
    }
}
