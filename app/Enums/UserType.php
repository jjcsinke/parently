<?php

namespace App\Enums;

enum UserType: string {
    case Admin = 'admin';
    case Parent = 'parent';
    case Child = 'child';
}
