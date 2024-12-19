<?php

namespace App\Enum;

enum UserRoleEnum: string
{
    // Can assign roles to users
    case SUPERADMIN = "super-admin";
    // Can manage other users
    case ADMIN = "admin";
    // Can manage centers
    case LOCALCOUNCIL = "local-council";
    // Can manage groups
    case GROUPHEAD = "group-head";

    case SUPERNUMERARIES = "super-numeraries";
    case COOPERATORS = "cooperator";
    case STANDARD = "standard";
    case USER = "user";


    public function label(): string {
        return match($this) {

            UserRoleEnum::SUPERADMIN => 'super admin',

            UserRoleEnum::ADMIN => 'admin',

            UserRoleEnum::LOCALCOUNCIL => 'local council',

            UserRoleEnum::GROUPHEAD => 'group head',

            UserRoleEnum::SUPERNUMERARIES => 'super numeraries',

            UserRoleEnum::COOPERATORS => 'cooperator',

            UserRoleEnum::STANDARD => 'standard',

            UserRoleEnum::USER => 'user',

        };
    }

    public function value(): string {
        return match($this) {

            UserRoleEnum::SUPERADMIN => 'super-admin',

            UserRoleEnum::ADMIN => 'admin',

            UserRoleEnum::LOCALCOUNCIL => 'local-council',

            UserRoleEnum::GROUPHEAD => 'group-head',

            UserRoleEnum::SUPERNUMERARIES => 'super-numeraries',

            UserRoleEnum::COOPERATORS => 'cooperator',

            UserRoleEnum::STANDARD => 'standard',

            UserRoleEnum::USER => 'user',

        };
    }

    public static function getValues(): array {  
        return array_column(self::cases(), 'value');  
    }    
}
