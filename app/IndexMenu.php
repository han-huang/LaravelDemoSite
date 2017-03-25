<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class IndexMenu extends Model
{
    protected $table = 'index_menus';

    protected $fillable = [
        'parent_id', 'title', 'url', 'order', 'active',
    ];
    
    /**
     * Display menu.
     *
     * @return string
     */
    public static function display()
    {
        // GET THE MENU
        $menuItems = static::where('active', 1)->get();
        $parentItems = $menuItems->filter(function($value, $key) {
            return $value->parent_id == null;
        });
        
        $parentItems = $parentItems->sortBy('order');

        $output = '<div id="navbar" class="collapse navbar-collapse">';
        $output .= '<ul class="nav navbar-nav">';
        
        foreach ($parentItems as $item) {
            $children_menu_items = $menuItems->filter(function($value, $key) use ($item) {
                return $value->parent_id == $item->id;
            });
            
            if ($children_menu_items->count() > 0) {
                $output .= '<li class="dropdown">';
                $output .= '<a href="'.$item->url.'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$item->title.'<span class="caret"></span></a>';
                $children_output = static::buildSubmenu($menuItems, $item->id, $item->url);
                $output .= $children_output;
                $output .= '</li>';
            } else {
                $output .= '<li><a href="'.$item->url.'">'.$item->title.'</a></li>';
            }
        }

        // $output .= '</ul>';
        // $output .= '</div>';
        return $output;
    }
    
    /**
     * Create submenu.
     *
     * @param \Illuminate\Support\Collection|array $menuItems
     * @param int                                  $parentId
     * @param string                               $parentUrl
     *
     * @return string
     */
    public static function buildSubmenu($menuItems, $parentId, $parentUrl = null)
    {
        $parentItems = $menuItems->filter(function($value, $key) use ($parentId) {
            return $value->parent_id == $parentId;
        });
        
        $parentItems = $parentItems->sortBy('order');

        $output = '<ul class="dropdown-menu">';
        
        foreach ($parentItems as $item) {
            $children_menu_items = $menuItems->filter(function ($value, $key) use ($item) {
                return $value->parent_id == $item->id;
            });
            
            if ($children_menu_items->count() > 0) {
                $output .= '<li class="dropdown-submenu">';
                $output .= '<a href="'.$item->url.'" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$item->title.'</a>';
                $children_output = static::buildSubmenu($menuItems, $item->id);
                $output .= $children_output;
                $output .= '</li>';
            } else {
                $output .= '<li><a href="'.$item->url.'">'.$item->title.'</a></li>';
                if (!strcmp($parentUrl, $item->url) && !empty($parentUrl)) {
                    // same url, add divider
                    $output .= '<li class="divider"></li>';
                }
            }
        }
        
        $output .= '</ul>';
        return $output;
    }
}
