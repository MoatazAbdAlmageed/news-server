<?php

namespace App\Jobs;

use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use TheGuardian;

class FetchTheGuardianNews implements ShouldQueue
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
        $the_guardian = new TheGuardian(env('GUARDIAN_API_KEY'));
        $sections = $the_guardian->get_sections();
        foreach ($sections as $section) {
            $articles = $the_guardian
                ->section($section->id)
                ->show_fields("all")
                ->get_articles();
            foreach ($articles as $article) {
                News::create([
                    'author' => $article?->fields?->byline ?? '',
                    'title' => $article?->webTitle ?? '',
                    'description' => $article?->fields?->standfirst ?? '',
                    'content' => $article?->fields?->standfirst ?? '',
                    'url' => $article?->webUrl ?? '',
                    'source' => $article?->fields?->publication,
                    'country' => $country ?? '',
                    'lang' => $article?->fields?->lang ?? '',
                    'urlToImage' => $article?->fields->thumbnail ?? '',
                    'publishedAt' => $article?->webPublicationDate ?? '',
                    'category' => $article?->sectionId ?? 'general',
                ]);
            }
        }
        return response('fetching done successfully');
    }
}
