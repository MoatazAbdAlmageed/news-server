<?php

namespace App\Jobs;

use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use jcobhams\NewsApi\NewsApi;

class FetchNewsApiNews implements ShouldQueue
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
        $api = new NewsApi(env('NEWS_API_KEY'));

        $categories = [
            "business",
            "entertainment",
            "general",
            "health",
            "science",
            "sports",
            "technology",

        ];
        $language = 'en';
        $country = 'us';
        $sources = $api->getSources($categories[2], $language, $country);
        foreach ($sources->sources as $source) {
            $everything = $api->getTopHeadlines(null, $source->id);
            foreach ($everything->articles as $article) {
                News::create([
                    'author' => $article?->author ?? '',
                    'title' => $article?->title ?? '',
                    'description' => $article?->description ?? '',
                    'url' => $article?->url ?? '',
                    'content' => $article?->content ?? '',
                    'source' => $article?->source->id,
                    'country' => $country,
                    'lang' => $language,
                    'urlToImage' => $article?->urlToImage ?? '',
                    'publishedAt' => $article?->publishedAt ?? '',
                    'category' => 'general',
                ]);
            }
        }

        return response('fetching done successfully');
    }
}
