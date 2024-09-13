<?php

namespace Spatie\LivewireComments\Policies;

use Spatie\Comments\Models\Concerns\Interfaces\CanComment;
use Spatie\Comments\Models\Reaction;

class ReactionPolicy
{
    public function delete(CanComment $commentator, Reaction $reaction): bool
    {
        return $reaction->madeBy($commentator);
    }
}
