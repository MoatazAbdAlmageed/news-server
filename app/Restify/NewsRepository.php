<?php

namespace App\Restify;

use App\Models\News;
use App\Restify\Actions\NewsAction;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class NewsRepository extends Repository
{
    public static string $model = News::class;
    public static bool|array $public = true;
    public static array $sort = ['publishedAt'];


    public static array $search = [
        'author',
        'title',
        'source',
    ];
    public static array $match = [
        'author' => 'string',
        'source' => 'array',
        'publishedAt' => 'datetime',
        'country' => 'string',
        'lang' => 'string',
        'category' => 'array',
    ];


    public static function related(): array
    {
        return [
            //TODO
        ];
    }

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('author'),
            field('title'),
            field('description'),
            field('url'),
            field('content'),
            field('source'),
            field('country'),
            field('lang'),
            field('category'),
            field('urlToImage'),
            field('publishedAt'),
        ];
    }


}
