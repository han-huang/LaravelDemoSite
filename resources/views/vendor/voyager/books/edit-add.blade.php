@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@if(isset($dataTypeContent->id))
    @section('page_title','Edit '.$dataType->display_name_singular)
@else
    @section('page_title','Add '.$dataType->display_name_singular)
@endif

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> @if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'New' }}@endif {{ $dataType->display_name_singular }}
    </h1>
@stop

@section('content')
<style>
.only-margin-left {
  margin:0px 0px 0px 6px !important;
}

.select-button-inline > div {
  margin-bottom:6px !important;
}

.select-button-inline > div:last-child {
  margin-bottom:0px !important;
}

.select-button-inline button {
  border-radius:4px !important;
}

.width-auto {
  width:auto !important;
}
</style>
<script>
$(function() {
    $('.select-button-inline').on('click', 'button', function(event) {
        event.preventDefault();
        var action = $(this).val();
        var column = $(this).closest('div').parent('div').attr('id');
        //console.log(action);
        //console.log(column);
        if (action == "add") {
            if(column == "author") {
                var new_div = '<div class="input-group"><select class="form-control width-auto" name="bookauthor_id[]">';
                new_div += @foreach(App\BookAuthor::all() as $bookauthor)
                               '<option value={{ $bookauthor->id }}>{{ $bookauthor->name }}</option>' +
                           @endforeach '';
                new_div += '</select><span class="input-group-btn pull-left">';
                new_div += '<button type="button" class="btn btn-default only-margin-left" value="delete">delete</button>';
                new_div += '<button type="button" class="btn btn-default only-margin-left" value="add">add</button>';
                new_div += '</span></div>';
            } else if(column == "translator") {
                var new_div = '<div class="input-group"><select class="form-control width-auto" name="booktranslator_id[]">';
                new_div += '<option value= >無</option>' + @foreach(App\BookTranslator::all() as $booktranslator)
                           '<option value={{ $booktranslator->id }}>{{ $booktranslator->name }}</option>' +
                           @endforeach '';
                new_div += '</select><span class="input-group-btn pull-left">';
                new_div += '<button type="button" class="btn btn-default only-margin-left" value="delete">delete</button>';
                new_div += '<button type="button" class="btn btn-default only-margin-left" value="add">add</button>';
                new_div += '</span></div>';
            }
            //console.log(new_div);
            $('#' + column).append(new_div);
        } else if (action == "delete") {
            //console.log('del button');
            //console.log($('#' + column + ' div').length);
            var child_div = $('#' + column + ' div').length;
            if(child_div == 1)
                alert("Can not delete the last one");
            else
                $(this).closest('div').remove();
        }
    });
});
</script>
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">

                    <div class="panel-heading">
                        <h3 class="panel-title">@if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'Add New' }}@endif {{ $dataType->display_name_singular }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"
                            action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(isset($dataTypeContent->id))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- If we are editing -->
                            @if(isset($dataTypeContent->id))
                                <?php $dataTypeRows = $dataType->editRows; ?>
                            @else
                                <?php $dataTypeRows = $dataType->addRows; ?>
                            @endif

                            <div id="author" class="form-group select-button-inline">
                                <label for="bookauthor_id">作者 Author</label>
                                <?php
                                    $book_bookauthors = (isset($dataTypeContent->id)) ? $dataTypeContent->bookauthors->pluck('name')->toArray() : [];
                                    //var_dump(isset($dataTypeContent->id));
                                    //var_dump($book_bookauthors);
                                ?>
                                @if(count($book_bookauthors) > 0)
                                    @foreach($book_bookauthors as $key => $book_bookauthor)
                                    <div class="input-group">
                                        <select class="form-control width-auto" name="bookauthor_id[]">
                                            @foreach(App\BookAuthor::all() as $bookauthor)
                                                <?php
                                                    //remove "(" and ")"
                                                    $pattern = preg_replace('/\(|\)/', '', $bookauthor->name);
                                                    //Log::info($bookauthor->name);
                                                    //Log::info($pattern);
                                                    $subject = preg_replace('/\(|\)/', '', $book_bookauthor);
                                                    //Log::info($book_bookauthor);
                                                    //Log::info($subject);
                                                ?>
                                                <option value={{ $bookauthor->id }} @if(preg_match("/$pattern/", $subject)) selected @endif>{{ $bookauthor->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn pull-left">
                                            <button type="button" class="btn btn-default only-margin-left" value="delete">delete</button>
                                            {{-- @if($key == (count($book_bookauthors) - 1)) --}}
                                                <button type="button" class="btn btn-default only-margin-left" value="add">add</button>
                                            {{-- @endif --}}
                                        </span>
                                    </div> 
                                    @endforeach

                                @else
                                    <div class="input-group">
                                        <select class="form-control width-auto" name="bookauthor_id[]">
                                            @foreach(App\BookAuthor::all() as $bookauthor)
                                                <option value={{ $bookauthor->id }}>{{ $bookauthor->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn pull-left">
                                            <button type="button" class="btn btn-default only-margin-left" value="delete">delete</button>
                                            <button type="button" class="btn btn-default only-margin-left" value="add">add</button>
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div id="translator" class="form-group select-button-inline">
                                <label for="booktranslator_id">譯者 Translator</label>
                                <?php
                                    $book_booktranslators = (isset($dataTypeContent->id)) ? $dataTypeContent->booktranslators->pluck('name')->toArray() : [];
                                ?>
                                @if(count($book_booktranslators) > 0)
                                    @foreach($book_booktranslators as $key => $book_booktranslator)
                                    <div class="input-group">
                                        <select class="form-control width-auto" name="booktranslator_id[]">
                                                <option value= >無</option>
                                            @foreach(App\BookTranslator::all() as $booktranslator)
                                                <option value={{ $booktranslator->id }} @if(preg_match("/$booktranslator->name/", $book_booktranslator)) selected @endif>{{ $booktranslator->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn pull-left">
                                            <button type="button" class="btn btn-default only-margin-left" value="delete">delete</button>
                                            {{-- @if($key == (count($book_booktranslators) - 1)) --}}
                                                <button type="button" class="btn btn-default only-margin-left" value="add">add</button>
                                            {{-- @endif --}}
                                        </span>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="input-group">
                                        <select class="form-control width-auto" name="booktranslator_id[]">
                                                <option value= >無</option>
                                            @foreach(App\BookTranslator::all() as $booktranslator)
                                                <option value={{ $booktranslator->id }}>{{ $booktranslator->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn pull-left">
                                            <button type="button" class="btn btn-default only-margin-left" value="delete">delete</button>
                                            <button type="button" class="btn btn-default only-margin-left" value="add">add</button>
                                        </span>
                                    </div>
                                @endif
                            </div>

                            @foreach($dataTypeRows as $row)
                                <div class="form-group">
                                    <label for="name">{{ $row->display_name }}</label>
                                    @if($row->field == 'publishing_date' && $row->type == 'date')
                                        <input type="date" class="form-control" name="{{ $row->field }}"
                                               placeholder="{{ $row->display_name }}"
                                               value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@else{{old($row->field)}}@endif">
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        
                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                        
                                    @endif
                                </div>
                            @endforeach

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });
        });
    </script>
    <script src="{{ config('voyager.assets_path') }}/lib/js/tinymce/tinymce.min.js"></script>
    <script src="{{ config('voyager.assets_path') }}/js/voyager_tinymce.js"></script>
    <script src="{{ config('voyager.assets_path') }}/js/slugify.js"></script>
@stop
