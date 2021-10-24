<?php

namespace App\Support;
use Illuminate\Http\Client\Response;

class Results
{
    protected $current_page;

    protected $items;

    protected $total_items;

    protected $paginator;
    
    /**
     * __construct
     * 
     * Constructor for the result response
     *
     * @param  mixed $response
     * @param  mixed $page
     * @return void
     */
    public function __construct(Response $response, int $page = 1)
    {
        $this->items = collect([]);
        $this->total_items = 0;
        $this->current_page = $page;

        if ($response->successful())
        {
            $results = json_decode($response->body());

            if(isset($results->Search)) {
                $this->items = collect($results->Search);
                $this->total_items = $results->totalResults;
            }
        }

        $this->preparePaginator();
    }
    
    /**
     * preparePaginator
     * 
     * Prepares param for the custom 
     * paginator.
     *
     * @return void
     */
    protected function preparePaginator()
    {
        $additional_page = ($this->total_items % 10) === 0 ?: 1;

        $total_pages = (int) ($this->total_items / 10) + $additional_page;

        $start_at = (($this->current_page - 3) > 1) ? ($this->current_page - 3): 1;

        $end_at = (($start_at + 7) < $total_pages) ? ($start_at + 7): $total_pages;

        $paginator = json_encode(
                    [
                        'current' => $this->current_page,
                        'total_pages' => $total_pages,
                        'start_at' => $start_at,
                        'end_at' => $end_at
                    ]);

        $this->paginator = json_decode($paginator);
    }
    
    /**
     * items
     * 
     * Get the items as a collection
     *
     * @return void
     */
    public function items()
    {
        return $this->items;
    }
    
    /**
     * current
     * 
     * Gets the current page
     *
     * @return void
     */
    public function current()
    {
        return $this->current_page;
    }
    
    /**
     * total
     *
     * Get the total number of records
     * 
     * @return void
     */
    public function total()
    {
        return $this->total_items;
    }
    
    /**
     * paginator
     * 
     * Gets the paginator
     *
     * @return void
     */
    public function paginator()
    {
        return $this->paginator;
    }
}
