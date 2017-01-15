<?php

namespace App\Repositories;

use App\IndexCarousel;

class IndexCarouselRepository
{
    /**
     * IndexCarousel instance
     *
     * @var IndexCarousel
     */
    protected $indexCarousel;

    /**
     * Create a new IndexCarouselRepository controller instance.
     *
     * @param  IndexCarousel  $indexCarousel
     * @return void
     */
    public function __construct(IndexCarousel $indexCarousel)
    {
        $this->indexCarousel = $indexCarousel;
    }

    /**
     * Get active items of the IndexCarousel.
     *
     * @return Collection
     */
    public function getActiveItems()
    {
        return $this->indexCarousel->where('active', 1)->get();
    }
    
    // public static function getActiveItems()
    // {
        // return IndexCarousel::where('active', 1)->get();
    // }
}
