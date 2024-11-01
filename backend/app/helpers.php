<?php

use App\Enums\SettingKeysEnum;
use App\Models\Setting;
use App\Models\User;
use Laravel\Sanctum\Contracts\HasApiTokens;

if (!function_exists('s')) {
    /**
     * @param User|HasApiTokens $user
     * @param string $ability
     * @return bool
     */
    function access(User|HasApiTokens $user, string $ability): bool
    {
        return $user->tokenCan($ability) || $user->tokenCan('*');
    }

    /**
     * @param SettingKeysEnum $key
     * @param null $default
     * @return bool
     */
    function setting(SettingKeysEnum $key, $default = null): mixed
    {
        return Setting::firstWhere('key', $key)?->value ?? $default;
    }
}