<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function create(User $user)
    {
        $section = Section::where('name','العلاقات العامة')->first();
        return $user->section_id == $section->id;
    }

    
}
