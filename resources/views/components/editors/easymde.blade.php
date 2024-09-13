@props([
    'comment' => null,
    'placeholder' => '',
    'model',
    'autofocus' => false,
])
<div
    x-data="{
        text: @entangle($model),
        autofocus: @js($autofocus),
        editor: null,

        loadEasyMDE() {
            if (window.EasyMDE) {
                return Promise.resolve();
            }

            const loadScript = new Promise((resolve) => {
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js';
                script.addEventListener('load', resolve);
                document.getElementsByTagName('head')[0].appendChild(script);
            });

            const loadCss = new Promise((resolve) => {
                const link = document.createElement('link');
                link.type = 'text/css';
                link.rel = 'stylesheet';
                link.href = 'https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css';
                link.addEventListener('load', resolve);
                document.getElementsByTagName('head')[0].appendChild(link);
            });

            return Promise.all([loadScript, loadCss]);
        },

        init() {
            this.open();
        },

        open() {
            if (this.editor) {
                return;
            }

            const textarea = this.$refs.textarea;

            if (! textarea) {
                return;
            }

            this.loadEasyMDE().then(() => {
                this.editor = new window.EasyMDE({
                    element: textarea,
                    hideIcons: [
                        'heading',
                        'image',
                        'preview',
                        'side-by-side',
                        'fullscreen',
                        'guide',
                    ],
                    autoDownloadFontAwesome: {{ config('comments.ui.autoload_fontawesome', true) ? 'true' : 'false' }},
                    spellChecker: false,
                    status: false,
                    insertTexts: {
                        link: ['[',  '](https://)'],
                    },
                });

                const editor = Alpine.raw(this.editor);

                editor.value(this.text);

                if (this.autofocus) {
                    $nextTick(() => {
                        editor.codemirror.focus();
                        editor.codemirror.setCursor(editor.codemirror.lineCount(), 0);
                    });
                }

                editor.codemirror.on('change', () => {
                    this.text = editor.value();
                });
            });
        },

        close() {
            if (! this.editor) return;

            this.editor.value('');
            this.editor.toTextArea();
            this.editor.cleanup();
            this.editor = null;
        },
    }"
    @if($comment)
        x-on:open-editor-{{ $comment->id }}.window="open"
        x-on:close-editor-{{ $comment->id }}.window="close"
    @endif
>
    <div wire:ignore>
        <textarea x-ref="textarea" placeholder="{{ $placeholder }}"></textarea>
    </div>

    <div class="comments-form-editor-tip">
        You can use <a href="https://spatie.be/markdown" target="_blank" rel="nofollow noopener noreferrer">Markdown</a>
    </div>
</div>
