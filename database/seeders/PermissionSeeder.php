<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * $actions array определяет, какие действия пользователь сможет выполнять с ресурсом.
     * $resources array определяет, кто будет выполнять эти действия. В нашем случае это просто определение модели.
     * Мы используем crossJoin метод сбора данных для сопоставления каждого действия с каждым ресурсом.
     * Позже мы сопоставим их с помощью implode() метода в строки типа user.viewAny,
     * user.View и создадим имена разрешений на основе этого.
     */
    public function run(): void
    {
        $actions = [
            'viewAny',
            'view',
            'create',
            'update',
            'delete',
            'restore',
            'forceDelete',
        ];

        $resources = [
            'user',
            'system',
        ];

        collect($resources)
            ->crossJoin($actions)
            ->map(function ($set) {
                return implode('.', $set);
            })->each(function ($permission) {
                Permission::create(['name' => $permission]);
            });
    }
}
