<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\Controller as VoyagerController;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Facades\Voyager;
use Log;

class NewsArticleController extends VoyagerController
{
    public function index(Request $request)
    {
        // return "hello world! NewsArticleController.";
    }

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = DataType::where('slug', '=', $slug)->first();
        // Check permission
        Voyager::canOrFail('add_'.$dataType->name);
        $view = 'backstage.news.edit-add';
        // for checked checkbox of field active
        $request->session()->put('active', '1');
        return view($view, compact('dataType'));
    }

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);
        $dataType = DataType::where('slug', '=', $slug)->first();
        // Check permission
        Voyager::canOrFail('edit_'.$dataType->name);
        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? call_user_func([$dataType->model_name, 'findOrFail'], $id)
            : DB::table($dataType->name)->where('id', $id)->first(); // If Model doest exist, get data from table name
        $view = 'backstage.news.edit-add';
        Log::info('edit : '.__FILE__." ".__FUNCTION__." ".__LINE__);
        return view($view, compact('dataType', 'dataTypeContent'));
    }
}
