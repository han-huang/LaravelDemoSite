<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class IndexCarousel extends Model
{
    protected $table = 'index_carousels';

    protected $fillable = [
        'title', 'description', 'image', 'url', 'order', 'active',
    ];
	
    /**
     * Display Carousel.
     *
     * @return string
     */
    public static function display()
    {
        // GET THE Carousel
        $carouselItems = static::where('active', 1)->get();
		
		// Indicators
		$output = '<ol class="carousel-indicators">';
		
		for ($i = 0 ; $i < $carouselItems->count(); $i++)
		{
			if ($i)
				$output .= ' <li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
			else
				$output .= ' <li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
		}
		
		$output .= '</ol>';
		
		// Wrapper for slides
		$output .= '<div class="carousel-inner" role="listbox" style="border : 0px solid black;padding: 0px;margin 0px">';
		
		foreach ($carouselItems as $key => $item) {
			if ($key)
				$output .= '<div class="item">';
			else
				$output .= '<div class="item active">';
			
			$output .= '<img src="'.Voyager::image($item->image).'" alt="'.$item->title.'" style="width:100%">';
			$output .= '<div class="carousel-caption">';
			$output .= '<h3>'.$item->title.'</h3>';
			$output .= '<p>'.$item->description.'</p>';
			$output .= '</div>';
			$output .= '</div>';
		}
		
		$output .= '</div>';
		return $output;
	}
}
