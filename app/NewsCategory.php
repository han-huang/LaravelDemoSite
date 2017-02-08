<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';

    protected $fillable = [
        'str', 'title', 'label_class', 'color',
    ];

    /**
     * Get NewsArticle.
     */
    public function newsArticle()
    {
        return $this->hasMany('App\NewsArticle', 'news_category_id');
    }

    /**
     * Get NewsPost.
     *
     * @return
     */
    public function newsPost()
    {
        return $this->hasMany('App\NewsPost', 'news_category_id');
    }

    /**
     * Get active NewsPost.
     *
     * @return
     */
    public function getNewsPostActive()
    {
        return $this->newsPost()->active();
    }

    /**
     * Get active and published NewsPost .
     *
     * @return
     */
    public function getNewsPostActivePublished()
    {
        return $this->newsPost()->active()->published();
    }

    /**
     * Get index of active NewsPost .
     *
     * @return
     */
    public function getNewsPostIndexActive()
    {
        return $this->newsPost()->selectbrief()
                   ->active();
    }

    /**
     * Get index of active and published NewsPost .
     *
     * @return
     */
    public function getNewsPostIndexActivePublished()
    {
        return $this->newsPost()->selectbrief()
                   ->active()->published();
    }

    /**
     * Get index of active, published and limited NewsPost .
     *
     * @param  $offset
     * @param  $limit
     * @return
     */
    public function getNewsPostLimitIndexActivePublished($offset, $limit)
    {
        return $this->newsPost()->selectbrief()
                   ->active()->published()->updatedtimedesc()
                   ->getlimit($offset, $limit)->get();
        // return $this->newsPost()->selectbrief()
                   // ->active()->published()
                   // ->offset($offset)->limit($limit)->get();
        // return $this->newsPost()->selectbrief()
                   // ->active()->published()
                   // ->skip($offset)->take($limit)->get();
    }

    /**
     * count active and published NewsPost .
     *
     * @return
     */
    public function countNewsPostActivePublished()
    {
        return $this->newsPost()->active()
                   ->published()->count();
    }

    /**
     * Get single row of active NewsPost.
     *
     * @param  $id
     * @return
     */
    public function getNewsPostActiveSingle($id)
    {
        return $this->newsPost()->active()->where('id', '=', $id);
    }

    /**
     * Get single row of active and published NewsPost .
     *
     * @param  $id
     * @return
     */
    public function getNewsPostActivePublishedSingle($id)
    {
        return $this->newsPost()->active()->published()->where('id', '=', $id);
    }
}
