<p align="center">Movie App</p>


## About

Uses the `omdbapi` api to find movies based on a simple query string.

Built on Laravel8, it shows how you can Route Model bind a Custom Model that calls an external service.

Additionally, the app highlights the query the user searched for on the view page.


### Requirements
- PHP: 7.3 or higher

### Installation
- Download (clone) the src into your project directory.
- run `composer install`
- Update the example .env provided, you need to get a api key from `http://www.omdbapi.com/apikey.aspx` so the app can access the items. Its free.
- Now run `php artisan serve`
- Typically you will viti http://127.0.0.1:8000/ in your browser but check whichj port you are running on.
- All done.

