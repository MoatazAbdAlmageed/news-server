# news_aggregator_website

## Installation

- `composer install`
- `php artisan migrate`
- `php artisan db:seed`
- run `php artisan schedule:work` to fetch the latest news or run jobs
  manually like this
- `php artisan job:dispatch FetchNewsApiNews`
- `php artisan job:dispatch FetchNYTimesNews`
- `php artisan job:dispatch FetchTheGuardianNews`

## TODO

- use another 1 resource like NEWS_API
