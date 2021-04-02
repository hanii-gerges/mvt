<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        $section = Section::where('name','التوعية')->first();
        return $user->section_id == $section->id;
    }

    public function update(User $user, Article $article)
    {
        return $user->id == $article->user_id;
    }

    public function delete(User $user, Article $article)
    {
        return $user->id == $article->user_id;
    }

}
