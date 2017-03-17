<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBreadController;
use TCG\Voyager\Facades\Voyager;
use Validator;

class BookController extends VoyagerBreadController
{
    /**
     * Rules for Validator.
     *
     * @var array
     */
    private $rules = [
        'title' => 'required',
        'pulbisher_name' => 'required',
        'list_price' => 'required|integer|numeric',
        'publishing_date' => 'required|date',
        'bookauthor_id.*' => 'required|integer|numeric',
        'booktranslator_id.*' => 'integer|numeric',
    ];

    // POST BRE(A)D
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $bookauthor_id = $request->input('bookauthor_id', []);
        $bookauthor_id_length = count($bookauthor_id);
        // remove empty values
        $booktranslator_id = array_filter($request->input('booktranslator_id', []));
        $booktranslator_id_length = count($booktranslator_id);
        // return compact('bookauthor_id', 'bookauthor_id_length', 'booktranslator_id', 'booktranslator_id_length');

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        Voyager::canOrFail('add_'.$dataType->name);

        $data = new $dataType->model_name();
        $this->insertUpdateData($request, $slug, $dataType->addRows, $data);

        $data->bookauthors()->sync($bookauthor_id);
        if($booktranslator_id_length)
            $data->booktranslators()->sync($booktranslator_id);

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
        $this->validate($request, $this->rules);

        $bookauthor_id = $request->input('bookauthor_id', []);
        $bookauthor_id_length = count($bookauthor_id);
        // remove empty values
        $booktranslator_id = array_filter($request->input('booktranslator_id', []));
        $booktranslator_id_length = count($booktranslator_id);
        // return compact('bookauthor_id', 'bookauthor_id_length', 'booktranslator_id', 'booktranslator_id_length');

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        Voyager::canOrFail('edit_'.$dataType->name);

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

        $data->bookauthors()->sync($bookauthor_id);
        if($booktranslator_id_length)
            $data->booktranslators()->sync($booktranslator_id);

        return redirect()
            ->route("voyager.{$dataType->slug}.index")
            ->with([
                'message'    => "Successfully Updated {$dataType->display_name_singular}",
                'alert-type' => 'success',
            ]);
    }
}
