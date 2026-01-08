<?php

namespace App\Helpers;

use App\Services\PermissionService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Permissions
{
   public static function hasPermission(string $permission): bool
   {
       return PermissionService::Permission($permission);
   }

}
