<?php

namespace Spatie\LivewireComments\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Comments\Models\Comment;

class CommentComponent extends Component
{
    use AuthorizesRequests;

    public ?Comment $comment;

    public int $commentId;

    public bool $showAvatar;

    public bool $newestFirst;

    public bool $writable;

    public string $replyText = '';

    public bool $isEditing = false;

    public string $editText = '';

    public bool $showReplies;

    public bool $showReactions;

    public function mount(Comment $comment)
    {
        $this->commentId = $comment->id;
        $this->comment = $comment;
    }

    public function startEditing(): void
    {
        $this->isEditing = true;
        $this->editText = $this->comment->original_text;
    }

    public function stopEditing(): void
    {
        $this->isEditing = false;
    }

    public function edit(): void
    {
        $this->authorize('update', $this->comment);

        $this->validate(['editText' => 'required']);

        $this->comment->update([
            'original_text' => $this->editText,
        ]);

        $this->isEditing = false;
    }

    public function reply(): void
    {
        $this->validate(['replyText' => 'required']);

        $this->comment->comment($this->replyText);
        $this->comment->load('nestedComments.commentator');

        $this->replyText = '';
        $this->dispatch('reply-created');
    }

    public function delete(): void
    {
        $this->authorize('delete', $this->comment);

        $this->comment->delete();
        $this->comment = null;

        $this->dispatch('delete');
    }

    public function approve(): void
    {
        $this->authorize('approve', $this->comment);

        $this->comment->approve();
    }

    public function reject(): void
    {
        $this->authorize('reject', $this->comment);

        $this->comment->reject();
        $this->comment = null;

        $this->dispatch('delete');
    }

    public function toggleReaction(string $reaction): void
    {
        if (! in_array($reaction, config('comments.allowed_reactions'))) {
            return;
        }

        $reactionModel = $this->comment->findReaction($reaction);

        $reactionModel
            ? $reactionModel->delete()
            : $this->comment->react($reaction);

        $this->comment->load('reactions');
    }

    public function render(): View|string
    {
        /** Temporary fix to render nothing if comment is deleted */
        if (! $this->comment) {
            return <<<blade
                <div></div>
            blade;
        }

        return view('comments::livewire.comment', [
            'comment' => $this->comment,
        ]);
    }
}
