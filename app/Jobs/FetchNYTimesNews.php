<?php

namespace App\Jobs;

use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchNYTimesNews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = "https://api.nytimes.com/svc/search/v2/articlesearch.json?api-key=" . env('NYTIMES_API_KEY');
        $response = file_get_contents($url);
        $data = json_decode($response);
        $articles = $data?->response?->docs;

        foreach ($articles as $article) {
            $urlToImage = "";
            News::create([
                'author' => $article?->byline?->original ?? '',
                'title' => $article?->abstract ?? '',
                'description' => $article?->lead_paragraph ?? '',
                'url' => $article?->web_url ?? '',
                'content' => $article?->lead_paragraph ?? '',
                'source' => 'nytimes',
                'country' => '',
                'lang' => 'en',
                'urlToImage' => !empty($article?->multimedia) ? "https://www.nytimes.com/" . $article?->multimedia[0]->url : "",
                'publishedAt' => $article?->pub_date ?? '',
                'category' => 'general',
            ]);
        }

        return response('fetching done successfully');
    }
}
