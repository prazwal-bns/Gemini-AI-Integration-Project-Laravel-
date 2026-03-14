<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiAPIService
{
    /**
     * @return array<mixed>
     */
    public static function generateContent(string $prompt): array
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-goog-api-Key' => config('app.gemini_api_key'),
        ])
            ->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent', [
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

        if ($response->successful()) {
            $text = $response->json()['candidates'][0]['content']['parts'][0]['text'];
        } else {
            $text = 'Something went wrong';
        }

        return ['response' => $text];
    }
}
