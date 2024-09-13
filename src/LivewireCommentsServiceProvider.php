<?php

namespace Spatie\LivewireComments;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LivewireComments\Livewire\CommentComponent;
use Spatie\LivewireComments\Livewire\CommentsComponent;
use Spatie\LivewireComments\Support\Config;

class LivewireCommentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-comments')
            ->hasViews('comments');
    }

    public function packageBooted()
    {
        $this
            ->registerComponents()
            ->registerPolicies();
    }

    protected function registerComponents(): self
    {
        Blade::componentNamespace('Spatie\\LivewireComments\\View\\Components', 'comments');

        Livewire::component('comments', CommentsComponent::class);
        Livewire::component('comments-comment', CommentComponent::class);

        return $this;
    }

    public function registerPolicies(): self
    {
        Gate::define('createComment', [Config::getCommentPolicyName(), 'create']);

        Gate::policy(Config::getCommentModelName(), Config::getCommentPolicyName());
        Gate::policy(Config::getReactionModelName(), Config::getReactionPolicyName());

        return $this;
    }
}
