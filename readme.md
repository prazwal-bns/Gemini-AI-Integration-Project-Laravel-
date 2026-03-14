# Gemini AI Integration

A Laravel application with Livewire that integrates with the Gemini API so users can send prompts and receive AI-generated responses in a simple chat interface.

## Features

- Laravel-based Gemini API integration
- Livewire-powered chat page
- Prompt submission and response history
- Environment-based API key configuration
- Simple service layer for calling Gemini

## Tech Stack

- PHP
- Laravel
- Livewire
- Tailwind CSS
- Gemini Generative Language API

## Requirements

- PHP 8.2+
- Composer
- Node.js and npm
- SQLite, MySQL, or another supported Laravel database
- A valid Gemini API key

## Installation

Clone the project and install dependencies:

```bash
composer install
npm install
```

Create your environment file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

If you are using the default SQLite setup, create the database file if needed:

```bash
New-Item database/database.sqlite -ItemType File
```

Run migrations:

```bash
php artisan migrate
```

Start the development servers:

```bash
php artisan serve
npm run dev
```

## Gemini API Setup

Get your Gemini API key from Google AI Studio or the Generative Language API dashboard, then place it in your `.env` file:

```env
GEMINI_API_KEY=your-gemini-api-key-here
```

This project reads the key through `config/app.php`:

```php
'gemini_api_key' => env('GEMINI_API_KEY', 'gemini-api-key-here'),
```

## Important Security Note

Do not commit real API keys to Git or put them directly in source files or README examples.

If the API key you pasted in chat is a real one, rotate it immediately in your Google AI/Cloud console and replace it with a new key stored only in `.env`.

## Gemini Quick Test

You can test the Gemini API outside Laravel with `curl` before using the application:

```bash
curl "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent" \
  -H "Content-Type: application/json" \
  -H "X-goog-api-key: YOUR_GEMINI_API_KEY" \
  -X POST \
  -d '{
    "contents": [
      {
        "parts": [
          {
            "text": "Explain how AI works in a few words"
          }
        ]
      }
    ]
  }'
```

Expected result: a JSON response containing generated content inside the `candidates` array.

## How This Project Integrates Gemini

The integration is handled in `app/Services/GeminiAPIService.php`.

The service:

- sends a POST request to the Gemini API
- passes the user prompt as `contents.parts.text`
- reads the generated text from the API response
- returns a simplified array containing the final response

Current request flow:

```php
$response = Http::withHeaders([
    'Content-Type' => 'application/json',
    'X-goog-api-Key' => config('app.gemini_api_key'),
])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent', [
    'contents' => [
        [
            'parts' => [
                [
                    'text' => $prompt,
                ],
            ],
        ],
    ],
]);
```

## Livewire Chat Page

The chat page is registered in `routes/web.php`:

```php
Route::livewire('/gemini-ai-chat', 'gemini-ai-chat')->name('gemini-ai-chat');
```

The Livewire view component is located at:

```text
resources/views/components/⚡gemini-ai-chat.blade.php
```

This component:

- validates the prompt
- sends the prompt to `GeminiAPIService::generateContent()`
- stores question/answer pairs in local component state
- renders the chat conversation in the UI

## Request Lifecycle

1. The user enters a prompt in the Livewire chat form.
2. Livewire submits the prompt to the `save()` method.
3. The component validates the prompt.
4. The prompt is sent to `GeminiAPIService`.
5. The service calls the Gemini API.
6. The response text is returned and added to chat history.
7. The UI updates automatically through Livewire.

## Environment Variables

At minimum, configure these values:

```env
APP_NAME="Gemini AI Integration"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
GEMINI_API_KEY=your-gemini-api-key-here
```

## Usage

After logging in and verifying your account if required, open:

```text
/gemini-ai-chat
```

From there you can:

- type a prompt
- submit it to Gemini
- view the generated response in the chat history

## Example Prompt Ideas

- Explain Laravel service classes in simple terms
- Write a product description for an AI app
- Summarize this topic in bullet points
- Help me debug a PHP error
- Give me three startup ideas using AI

## Troubleshooting

### View not found

If you see a "View not found" error, make sure your Livewire component route and component file location match your Livewire version and project structure.

### No response from Gemini

Check:

- the API key in `.env`
- that `config/app.php` reads `GEMINI_API_KEY`
- your internet connection
- the returned API response body for errors

### `.env` changes not applying

Clear config cache:

```bash
php artisan config:clear
php artisan cache:clear
```

### Authentication issues

The chat route is inside the authenticated and verified middleware group, so users must be logged in to access it.

## Suggested Improvements

- store chat history in the database instead of component state
- add better API error handling and logging
- support multiple Gemini models
- add markdown rendering for AI responses
- add per-user conversation history
- add rate limiting and prompt length controls

## License

This project is open for personal learning and development use unless you define a separate license.
