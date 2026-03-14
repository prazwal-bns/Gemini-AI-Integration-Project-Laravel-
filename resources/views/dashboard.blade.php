<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <section class="relative overflow-hidden rounded-[2rem] border border-slate-200 bg-gradient-to-br from-white via-sky-50 to-indigo-100 p-8 shadow-sm dark:border-neutral-800 dark:from-neutral-950 dark:via-slate-950 dark:to-indigo-950/50 lg:p-12">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(59,130,246,0.16),_transparent_32%),radial-gradient(circle_at_bottom_left,_rgba(99,102,241,0.14),_transparent_28%)]"></div>

            <div class="relative max-w-3xl space-y-6">
                <span class="inline-flex items-center rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-xs font-medium uppercase tracking-[0.22em] text-sky-700 backdrop-blur dark:border-sky-500/20 dark:bg-white/5 dark:text-sky-300">
                    Gemini AI Integration
                </span>

                <div class="space-y-4">
                    <h1 class="text-3xl font-semibold tracking-tight text-slate-900 dark:text-white lg:text-5xl">
                        A simple AI-powered application where users can ask questions and get answers from Gemini.
                    </h1>

                    <p class="max-w-2xl text-sm leading-7 text-slate-600 dark:text-slate-300 lg:text-base">
                        This project is built to provide a clean and user-friendly experience for interacting with Gemini AI. Users can submit prompts, explore ideas, get instant responses, and use AI for everyday tasks like writing, learning, research, and problem solving.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <span class="rounded-full bg-slate-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-slate-900">AI Assistant</span>
                    <span class="rounded-full border border-slate-300 bg-white/80 px-4 py-2 text-sm font-medium text-slate-700 dark:border-neutral-700 dark:bg-white/5 dark:text-slate-200">Prompt Based</span>
                    <span class="rounded-full border border-slate-300 bg-white/80 px-4 py-2 text-sm font-medium text-slate-700 dark:border-neutral-700 dark:bg-white/5 dark:text-slate-200">Fast Responses</span>
                </div>
            </div>
        </section>

        <section class="grid gap-6 md:grid-cols-3">
            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-100 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M3.75 9.75h16.5M4.5 18.75h15a.75.75 0 0 0 .75-.75V8.25a3 3 0 0 0-3-3h-10.5a3 3 0 0 0-3 3V18a.75.75 0 0 0 .75.75Z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Ask Anything</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300">
                    Users can type any question or prompt and receive AI-generated answers in a simple conversational flow.
                </p>
            </div>

            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-100 text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-2.395-.814a4.5 4.5 0 0 1-2.572-6.25l.82-1.8a4.5 4.5 0 0 1 6.25-2.572l1.8.82a4.5 4.5 0 0 1 2.572 6.25l-.814 2.395-2.846-.813Zm0 0 3.057-3.057a2.25 2.25 0 0 1 3.182 0l.879.879a2.25 2.25 0 0 1 0 3.182L13.88 19.96a2.25 2.25 0 0 1-3.182 0l-.879-.879a2.25 2.25 0 0 1 0-3.182Z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Powered by Gemini</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300">
                    The application connects with Gemini AI to generate helpful, smart, and contextual responses for users.
                </p>
            </div>

            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 15.75V8.25a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 8.25v7.5A2.25 2.25 0 0 1 18.75 18h-13.5A2.25 2.25 0 0 1 3 15.75Zm0 0 3.857-3.857a2.25 2.25 0 0 1 3.182 0l.621.621m0 0 2.836 2.836a2.25 2.25 0 0 0 3.182 0L21 12m-10.34.514 2.318-2.318a2.25 2.25 0 0 1 3.182 0L18.75 12" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white">Clean User Experience</h2>
                <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300">
                    The goal is to keep the interface minimal, modern, and easy to use so the focus stays on the AI interaction.
                </p>
            </div>
        </section>

        <section class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-800 dark:bg-neutral-900 lg:p-8">
            <div class="grid gap-6 lg:grid-cols-[1.1fr,0.9fr] lg:items-start">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-900 dark:text-white">Project Overview</h2>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        This dashboard introduces the purpose of the application. It is designed as a base for an AI chat product where users can interact with Gemini to get useful answers, creative content, technical help, and general assistance.
                    </p>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        You can later extend this page with your own chat interface, prompt history, conversation list, and AI response components.
                    </p>
                </div>

                <div class="rounded-[1.5rem] bg-slate-50 p-6 dark:bg-neutral-950">
                    <p class="text-sm font-semibold text-slate-900 dark:text-white">Core ideas</p>
                    <ul class="mt-4 space-y-3 text-sm text-slate-600 dark:text-slate-300">
                        <li>Let users send prompts to Gemini AI</li>
                        <li>Display responses in a readable interface</li>
                        <li>Make it easy to expand into a full chat product</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</x-layouts::app>
