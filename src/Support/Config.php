<?php

namespace Spatie\LivewireComments\Support;

use Spatie\Comments\Support\Config as BaseConfig;
use Spatie\LivewireComments\Policies\CommentPolicy;

use Spatie\LivewireComments\Policies\ReactionPolicy;

class Config extends BaseConfig
{
    /** @return class-string<CommentPolicy> */
    public static function getCommentPolicyName(): string
    {
        return config('comments.policies.comment', CommentPolicy::class);
    }

    /** @return class-string<ReactionPolicy> */
    public static function getReactionPolicyName(): string
    {
        return config('comments.policies.reaction', ReactionPolicy::class);
    }

    public static function editor(): string
    {
        return config('comments.ui.editor', 'comments::editors.easymde');
    }

    public static function showAvatars(): bool
    {
        return config('comments.ui.show_avatars', true);
    }

    public static function paginationCount(): int
    {
        return config('comments.pagination.results', 10_000);
    }

    public static function paginationPageName(): string
    {
        return config('comments.pagination.page_name', 'page');
    }

    public static function paginationTheme(): string
    {
        return config('comments.pagination.theme', 'tailwind');
    }
}
