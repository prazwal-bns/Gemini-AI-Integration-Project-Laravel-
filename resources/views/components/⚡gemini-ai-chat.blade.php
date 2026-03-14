<?php

use App\Services\GeminiAPIService;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component {
    #[Validate(['required', 'string', 'max:1000'])]
    public string $prompt = '';

    /**
     * @var array<mixed>
     */
    public array $history = [];

    public function save(): void
    {
        $this->validate();

        $historyValue = ['question' => $this->prompt];

        $response = GeminiAPIService::generateContent($this->prompt);

        $historyValue['answer'] = $response['response'] ?? 'No response';
        $this->history[] = $historyValue;
        $this->reset('prompt');
    }
};
?>

<div class="mx-auto w-full max-w-7xl px-4 py-6 text-slate-900 sm:px-6 lg:px-8 dark:text-slate-100">


    <div class="mt-6 grid gap-6 xl:grid-cols-[320px,1fr]">
        <section class="rounded-[2rem] border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
            <div class="border-b border-slate-200 px-6 py-5 dark:border-slate-800">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Conversation</h2>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                            Send your message below and Gemini will respond here.
                        </p>
                    </div>

                    <div class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-medium text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300">
                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                        Live session
                    </div>
                </div>
            </div>

            <div class="space-y-6 p-6">
                <form class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-4 dark:border-slate-800 dark:bg-slate-950" wire:submit.prevent="save">
                    <label for="prompt" class="mb-3 block text-sm font-medium text-slate-700 dark:text-slate-300">
                        Your prompt
                    </label>

                    <textarea
                        id="prompt"
                        name="prompt"
                        wire:model.live="prompt"
                        rows="4"
                        placeholder="Ask Gemini anything... For example: Help me write a friendly introduction for my AI application."
                        class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:border-sky-500 focus:outline-none focus:ring-4 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:placeholder:text-slate-500 dark:focus:border-sky-400 dark:focus:ring-sky-500/10"
                    ></textarea>

                    @error('prompt')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror

                    <div class="mt-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <p class="text-xs text-slate-500 dark:text-slate-400">
                            Keep prompts clear for better answers.
                        </p>

                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            wire:target="save"
                            class="cursor-pointer inline-flex items-center justify-center rounded-2xl bg-slate-950 px-5 py-3 text-sm font-medium text-white transition hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-200 disabled:cursor-not-allowed disabled:opacity-70 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-200 dark:focus:ring-slate-700"
                        >
                            <span wire:loading.remove wire:target="save">Send message</span>
                            <span wire:loading wire:target="save">Thinking...</span>
                        </button>
                    </div>
                </form>

                <div class="rounded-[1.5rem] border border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900">
                    <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4 dark:border-slate-800">
                        <h3 class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">Chat History</h3>
                        <span class="text-xs text-slate-400 dark:text-slate-500">{{ count($this->history) }} messages</span>
                    </div>

                    <div class="max-h-[34rem] space-y-5 overflow-y-auto p-5">
                        @if (count($this->history) === 0)
                            <div class="flex min-h-[20rem] flex-col items-center justify-center rounded-[1.5rem] border border-dashed border-slate-300 bg-slate-50 px-6 text-center dark:border-slate-700 dark:bg-slate-950">
                                <div class="flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-100 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor" class="h-8 w-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3h5.25m-8.25 8.25h12A2.25 2.25 0 0 0 18.75 17.25V6.75A2.25 2.25 0 0 0 16.5 4.5h-9A2.25 2.25 0 0 0 5.25 6.75v10.5A2.25 2.25 0 0 0 7.5 19.5Z" />
                                    </svg>
                                </div>
                                <h4 class="mt-5 text-lg font-semibold text-slate-900 dark:text-white">No conversation yet</h4>
                                <p class="mt-2 max-w-md text-sm leading-6 text-slate-500 dark:text-slate-400">
                                    Start with a prompt above to begin chatting with Gemini. Your messages and AI responses will appear here.
                                </p>
                            </div>
                        @endif

                        @foreach ($this->history as $index => $item)
                            <div wire:key="chat-message-{{ $index }}" class="space-y-4">
                                <div class="flex justify-end">
                                    <div class="max-w-[85%]">
                                        <p class="mb-2 text-right text-xs font-medium uppercase tracking-[0.16em] text-slate-400 dark:text-slate-500">
                                            You
                                        </p>
                                        <div class="rounded-3xl rounded-br-md bg-slate-950 px-4 py-3 text-sm leading-6 text-white shadow-sm dark:bg-white dark:text-slate-900">
                                            {{ $item['question'] }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-start">
                                    <div class="max-w-[85%]">
                                        <p class="mb-2 text-xs font-medium uppercase tracking-[0.16em] text-sky-600 dark:text-sky-400">
                                            Gemini
                                        </p>
                                        <div class="rounded-3xl rounded-bl-md border border-slate-200 bg-slate-50 px-4 py-3 text-sm leading-6 text-slate-700 shadow-sm dark:border-slate-700 dark:bg-slate-950 dark:text-slate-200">
                                            {{ $item['answer'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div wire:loading wire:target="save" class="flex justify-start">
                            <div class="max-w-[85%] rounded-3xl rounded-bl-md border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-600 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-300">
                                Gemini is generating a response...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
