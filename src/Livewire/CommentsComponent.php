<?php

namespace Spatie\LivewireComments\Livewire;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Comments\Enums\NotificationSubscriptionType;
use Spatie\LivewireComments\Support\Config;

class CommentsComponent extends Component
{
    use WithPagination;

    /** @var \Spatie\Comments\Models\Concerns\HasComments */
    public Model $model;

    public string $text = '';

    public bool $writable;
    public bool $showAvatars;
    public bool $showNotificationOptions;
    public bool $newestFirst;
    public string $selectedNotificationSubscriptionType = '';
    public ?string $noCommentsText = null;
    public bool $showReplies;
    public bool $showReactions;

    protected $listeners = [
        'delete' => '$refresh',
        'reply-created' => 'saveNotificationSubscription',
    ];

    public function mount(
        bool  $readOnly = false,
        ?bool $hideAvatars = null,
        bool  $hideNotificationOptions = false,
        bool $newestFirst = false,
        bool $noReplies = false,
        bool $noReactions = false,
    ): void {
        $this->writable = ! $readOnly;
        $this->showReplies = ! $noReplies;
        $this->showReactions = ! $noReactions;
        $this->newestFirst = $newestFirst;
        $this->showNotificationOptions = ! $hideNotificationOptions;

        $showAvatars = is_null($hideAvatars)
            ? null
            : ! $hideAvatars;

        $this->showAvatars = $showAvatars ?? Config::showAvatars();

        $this->selectedNotificationSubscriptionType = auth()->user()
                ?->notificationSubscriptionType($this->model)?->value ?? NotificationSubscriptionType::Participating->value;
    }

    public function comment(): void
    {
        $this->validate(['text' => 'required']);

        $this->model->comment($this->text);

        $this->text = '';

        $this->newestFirst
            ? $this->resetPage(Config::paginationPageName())
            : $this->gotoPage($this->comments->lastPage(), Config::paginationPageName());

        $this->saveNotificationSubscription();

        $this->dispatch('comment');
    }

    public function updateSelectedNotificationSubscriptionType($type): void
    {
        $this->selectedNotificationSubscriptionType = $type;

        $this->saveNotificationSubscription();
    }

    public function saveNotificationSubscription(): void
    {
        if (! $this->showNotificationOptions) {
            return;
        }

        /** @var \Spatie\Comments\Models\Concerns\Interfaces\CanComment $currentUser */
        $currentUser = auth()->user();

        if (! $currentUser) {
            return;
        }

        $type = NotificationSubscriptionType::from($this->selectedNotificationSubscriptionType);

        if ($type === NotificationSubscriptionType::None) {
            $currentUser->unsubscribeFromCommentNotifications($this->model);

            return;
        }

        $currentUser->subscribeToCommentNotifications(
            $this->model,
            NotificationSubscriptionType::from($this->selectedNotificationSubscriptionType)
        );
    }

    #[Computed]
    public function comments(): LengthAwarePaginator
    {
        return $this->model
            ->comments()
            ->with([
                'commentator',
                'nestedComments' => function (HasMany $builder) {
                    if ($this->newestFirst) {
                        $builder->latest();
                    }
                },
                'nestedComments.commentator',
                'reactions.commentator',
                'nestedComments.reactions.commentator',
            ])
            ->when(
                $this->newestFirst,
                fn (Builder $builder) => $builder->latest(),
                fn (Builder $builder) => $builder->oldest(),
            )
            ->paginate(Config::paginationCount(), ['*'], Config::paginationPageName());
    }

    public function render(): View
    {
        return view('comments::livewire.comments');
    }

    public function paginationView(): string
    {
        if (view()->exists(Config::paginationTheme())) {
            return Config::paginationTheme();
        }

        if (view()->exists('livewire::' . Config::paginationTheme())) {
            return 'livewire::' . Config::paginationTheme();
        }

        return 'livewire::tailwind';
    }
}
