<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\Controller as VoyagerController;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Facades\Voyager;
use App\NewsCategory;
use Log;
use Validator;

class NewsPostController extends VoyagerController
{
    /**
     * Rules for Validator.
     *
     * @var array
     */
    private $rules = [
        'author' => 'required|max:255',
        'news_category_id' => 'required|integer',
        'title' => 'required|max:255',
        'body' => 'required',
        'status' => 'required|max:255',
        /**
         * toggleswitch checkbox - on -> send active:on
         * toggleswitch checkbox - off -> send nothing
         * 
         * comment 'active' due to : on -> send active:on (not integer), off -> send nothing(not required)
         */
        //'active' => 'required|integer',
    ];

    /**
     * Messages for Validator.
     *
     * @var array
     */
    private $messages = [
        'required' => ':attribute 的欄位是必要的。',
    ];

    public function index(Request $request)
    {
        return "NewsPostController.";
    }

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = DataType::where('slug', '=', $slug)->first();
        // Check permission
        Voyager::canOrFail('add_'.$dataType->name);
        $view = 'backstage.news_posts.edit-add';
        $row = DataRow::where('data_type_id', $dataType->id)->where('field', 'status')->first();
        $newsCategories = NewsCategory::all();
        return view($view, compact('dataType', 'row', 'newsCategories'));
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

        $view = 'backstage.news_posts.edit-add';
        $row = DataRow::where('data_type_id', $dataType->id)->where('field', 'status')->first();
        $newsCategories = NewsCategory::all();

        return view($view, compact('dataType', 'dataTypeContent', 'row', 'newsCategories'));
    }

    // POST BRE(A)D
    public function store(Request $request)
    {
        $ret = $this->newspostValidate($request);
        if(!empty($ret)) {
            return $ret;
        }
        
        $slug = $this->getSlug($request);
        $dataType = DataType::where('slug', '=', $slug)->first();
        // Check permission
        Voyager::canOrFail('add_'.$dataType->name);
        if (function_exists('voyager_add_post')) {
            $url = $request->url();
            voyager_add_post($request);
        }
        $data = new $dataType->model_name();
        $this->insertUpdateData($request, $slug, $dataType->addRows, $data);
        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => "Successfully Added New {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        $ret = $this->newspostValidate($request);
        if(!empty($ret)) {
            return $ret;
        }

        $slug = $this->getSlug($request);
        $dataType = DataType::where('slug', '=', $slug)->first();
        // Check permission
        Voyager::canOrFail('edit_'.$dataType->name);
        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);
        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => "Successfully Updated {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }

    /**
     * Validate for requested data of news post.
     *
     * @param  Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function newspostValidate(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                ->withErrors($validator);
        }
    }
}
