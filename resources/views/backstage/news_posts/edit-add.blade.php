@extends('voyager::master')

@section('css')
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> @if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'New' }}@endif {{ $dataType->display_name_singular }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form role="form" action="@if(isset($dataTypeContent->id)){{ route('voyager.news-posts.update', $dataTypeContent->id) }}@else{{ route('voyager.news-posts.store') }}@endif" method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <!-- If we are editing -->
            @if(isset($dataTypeContent->id))
                <?php $dataTypeRows = $dataType->editRows; ?>
            @else
                <?php $dataTypeRows = $dataType->addRows; ?>
            @endif
            
            <div class="row">
                <div class="col-md-8">
                    <!-- ### TITLE ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-character"></i> News Post Title
                                <span class="panel-desc"> The title for your news post</span>
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo (isset($dataTypeContent->title) && !is_null(old('title', $dataTypeContent->title))) ? old('title', $dataTypeContent->title) : old('title'); ?>">
                        </div>
                    </div>

                    <!-- ### Author ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Author <small>The Author for your news post</small></h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <input type="text" class="form-control" name="author" placeholder="Author" value="<?php echo (isset($dataTypeContent->author) && !is_null(old('author', $dataTypeContent->author))) ? old('author', $dataTypeContent->author) : old('author'); ?>">
                        </div>
                    </div>
                    
                    <!-- ### CONTENT ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-book"></i> News Post Content</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        <textarea class="richTextBox" name="body" style="border:0px;"><?php echo (isset($dataTypeContent->body) && !is_null(old('body', $dataTypeContent->body))) ? old('body', $dataTypeContent->body) : old('body'); ?></textarea>
                    </div><!-- .panel -->

                    <!-- ### EXCERPT ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Excerpt <small>Small description of this news post</small></h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                          <textarea class="form-control" name="excerpt"><?php echo (isset($dataTypeContent->excerpt) && !is_null(old('excerpt', $dataTypeContent->excerpt))) ? old('excerpt', $dataTypeContent->excerpt) : old('excerpt'); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> News Post Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Tag</label>
                                <input type="text" class="form-control" name="tag" placeholder="tag" value="<?php echo (isset($dataTypeContent->tag) && !is_null(old('tag', $dataTypeContent->tag))) ? old('tag', $dataTypeContent->tag) : old('tag'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">URL slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="slug" value="<?php echo (isset($dataTypeContent->slug) && !is_null(old('slug', $dataTypeContent->slug))) ? old('slug', $dataTypeContent->slug) : old('slug'); ?>">
                            </div>
                            <div class="form-group">
                                <!-- 
                                <label for="name">News Post Status</label>
                                <select class="form-control" name="status">
                                    <option value="PUBLISHED" @if(isset($dataTypeContent->status) && $dataTypeContent->status == 'PUBLISHED'){{ 'selected="selected"' }}@endif>published</option>
                                    <option value="DRAFT" @if(isset($dataTypeContent->status) && $dataTypeContent->status == 'DRAFT'){{ 'selected="selected"' }}@endif>draft</option>
                                    <option value="PENDING" @if(isset($dataTypeContent->status) && $dataTypeContent->status == 'PENDING'){{ 'selected="selected"' }}@endif>pending</option>
                                </select>
                                -->
                                <?php //echo '$dataType : '.get_class($dataType)."<br>"; ?>
                                <?php //echo '$dataTypeRows : '.get_class($dataTypeRows)."<br>"; ?>
                                
                                {{-- @foreach($dataTypeRows as $row) --}}
                                    <?php //echo '$row : '.get_class($row)."<br>"; ?>
                                    @if($row->type == "select_dropdown" && $row->field == "status")
                                      
                                        <?php $options = json_decode($row->details); ?>
                                            <label for="name">{{ $dataType->display_name_singular }} {{ $row->display_name }}</label>
                                            <?php $selected_value = (isset($dataTypeContent->{$row->field}) && !is_null(old($row->field, $dataTypeContent->{$row->field}))) ? old($row->field, $dataTypeContent->{$row->field}) : old($row->field); ?>
                                            <select class="form-control" name="{{ $row->field }}">
                                                <?php $default = (isset($options->default) && !isset($dataTypeContent->{$row->field})) ? $options->default : NULL; ?>
                                                @if(isset($options->options))
                                                    @foreach($options->options as $key => $option)
                                                        <option value="{{ $key }}" @if($default == $key && $selected_value === NULL){{ 'selected="selected"' }}@endif @if($selected_value == $key){{ 'selected="selected"' }}@endif>{{ $option }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                    @endif
                                {{-- @endforeach --}}
                            </div>
                            <div class="form-group">
                                <label for="name">News Post Category</label>
                                <select class="form-control" name="news_category_id">
                                    @foreach($newsCategories as $category)
                                        <?php $news_category_id = (isset($dataTypeContent->news_category_id) && !is_null(old('news_category_id', $dataTypeContent->news_category_id))) ? old('news_category_id', $dataTypeContent->news_category_id) : old('news_category_id'); ?>
                                        <option value="{{ $category->id }}" @if($news_category_id == $category->id){{ 'selected="selected"' }}@endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Featured</label>
                                <br>
                                <?php $featured = (isset($dataTypeContent->featured) && !is_null(old('featured', $dataTypeContent->featured))) ? old('featured', $dataTypeContent->featured) : old('featured'); ?>
                                <?php
                                // if $errors happen when update data (redirect()->back()), use old('featured')
                                if (count($errors) > 0)$featured = old('featured'); 
                                ?>
                                <?php //echo "featured: ".$featured; ?>
                                <input type="checkbox" name="featured" class="toggleswitch" @if($featured){{ 'checked="checked"' }}@endif>
                            </div>
                            <div class="form-group">
                                <label for="name">Active</label>
                                <br>
                                <?php $checked = (isset($dataTypeContent->active) && !is_null(old('active', $dataTypeContent->active))) ? old('active', $dataTypeContent->active) : old('active'); ?>
                                <?php
                                // if $errors happen when update data (redirect()->back()), use old('active')
                                if (count($errors) > 0)$checked = old('active');
                                ?>
                                <?php //echo "active: ".$checked; ?>
                                <input type="checkbox" name="active" class="toggleswitch" @if($checked) checked @endif>
                            </div>
                            <div class="form-group">
                                <label for="name">Breaking news</label>
                                <br>
                                <?php $checked = (isset($dataTypeContent->breaking_news) && !is_null(old('breaking_news', $dataTypeContent->breaking_news))) ? old('breaking_news', $dataTypeContent->breaking_news) : old('breaking_news'); ?>
                                <?php
                                // if $errors happen when update data (redirect()->back()), use old('breaking_news')
                                if (count($errors) > 0)$checked = old('breaking_news');
                                ?>
                                <?php //echo "breaking_news: ".$checked; ?>
                                <input type="checkbox" name="breaking_news" class="toggleswitch" @if($checked) checked @endif>
                            </div>
                            <div class="form-group">
                                <label for="name">Carousel</label>
                                <br>
                                <?php $checked = (isset($dataTypeContent->carousel) && !is_null(old('carousel', $dataTypeContent->carousel))) ? old('carousel', $dataTypeContent->carousel) : old('carousel'); ?>
                                <?php
                                // if $errors happen when update data (redirect()->back()), use old('carousel')
                                if (count($errors) > 0)$checked = old('carousel');
                                ?>
                                <?php //echo "carousel: ".$checked; ?>
                                <input type="checkbox" name="carousel" class="toggleswitch" @if($checked) checked @endif>
                            </div>
                        </div>
                    </div>

                    <!-- ### IMAGE ### -->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> News Post Image</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(isset($dataTypeContent->image))
                                <img src="{{ Voyager::image( $dataTypeContent->image ) }}" style="width:100%" />
                            @endif
                            <input type="file" name="image">
                        </div>
                    </div>

                    <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i> SEO Content</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Meta Description</label>
                                <textarea class="form-control" name="meta_description"><?php echo (isset($dataTypeContent->meta_description) && !is_null(old('meta_description', $dataTypeContent->meta_description))) ? old('meta_description', $dataTypeContent->meta_description) : old('meta_description'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords"><?php echo (isset($dataTypeContent->meta_keywords) && !is_null(old('meta_keywords', $dataTypeContent->meta_keywords))) ? old('meta_keywords', $dataTypeContent->meta_keywords) : old('meta_keywords'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">SEO Title</label>
                                <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="<?php echo (isset($dataTypeContent->seo_title) && !is_null(old('seo_title', $dataTypeContent->seo_title))) ? old('seo_title', $dataTypeContent->seo_title) : old('seo_title'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right">
                @if(isset($dataTypeContent->id)){{ 'Update News Post' }}@else<?= '<i class="icon wb-plus-circle"></i> Create New News Post'; ?>@endif
            </button>
        </form>

    
        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            {{ csrf_field() }}
            <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
        </form>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
            <?php //$testerrors=["abc", "edf"]; ?>
            
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
            
            @if (!empty($success))
                toastr.success('{{ $success }}');
            @endif
        });
    </script>
    <script src="{{ config('voyager.assets_path') }}/lib/js/tinymce/tinymce.min.js"></script>
    <!-- <script src="/js/newspost_tinymce.js"></script> -->
    <script src="{{ asset('js/newspost_tinymce.js') }}"></script>
@stop