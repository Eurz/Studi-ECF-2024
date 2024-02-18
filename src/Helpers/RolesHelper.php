<?php

namespace App\Helpers;

/**
 * Manage available status for Task
 */
class RolesHelper
{

    const ROLE_ADMIN = 'Administrateur';
    const ROLE_EMPLOYEE = 'Employé';
    const ROLE_USER = 'Utilisateur';
    /**
     * @return Array List all availables status
     */
    public static function getRoles()
    {

        return  [
            self::ROLE_ADMIN => 'ROLE_ADMIN',
            self::ROLE_EMPLOYEE => 'ROLE_EMPLOYEE',
            self::ROLE_USER => 'ROLE_USER'
        ];
    }

    public static function getRoleName(string $key)
    {
        $roles = [
            'ROLE_ADMIN' => 'Administrateur',
            'ROLE_EMPLOYEE' => 'Employé',
            'ROLE_USER' => 'Utilisateur'
        ];
        return $roles[$key];
    }
}
