<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\IndexCarouselRepository;

class IndexController extends Controller
{
    /**
     * IndexCarouselRepository instance
     *
     * @var IndexCarouselRepository
     */
    protected $indexCarouselRepository;

    /**
     * Create a new IndexController controller instance.
     *
     * @param  IndexCarouselRepository  $indexCarouselRepository
     * @return void
     */
    public function __construct(IndexCarouselRepository $indexCarouselRepository)
    {
        $this->indexCarouselRepository = $indexCarouselRepository;
    }
    
    /**
     * Get Index View.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getIndexView(Request $request)
    {
        $carouselActiveItems = $this->indexCarouselRepository->getActiveItems();
        ClickCounterController::trackRecord($request);
        return view('site.index_view', compact('carouselActiveItems'));
    }
}
