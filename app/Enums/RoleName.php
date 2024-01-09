<?php

namespace App\Enums;

/**
 * Вводим роль администратора.
 * Перечисление ролей, которое используется в методах определения
 */
enum RoleName: string
{
    case ADMIN    = 'admin';
    case OWNER   = 'owner';
    case STAFF    = 'staff';
    case CLIENT = 'client';
}
