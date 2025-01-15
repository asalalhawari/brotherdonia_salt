@extends('admin.layout.master')
@section('title')
@endsection
@section('css')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{ route('dashboard.main-categories.index') }}">{{ trans('general.products_categories') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('general.create') }}</li>
@endsection

@section('content')
    @include('components.messagesAndErrors')
    <section id="basic-horizontal-layouts">
        <form class="form form-horizontal" action="{{ route('dashboard.scroll.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class=" card table-list-card">

                <div class=" card table-list-card-header">

                </div>

                <div class="card-body">
                    <div class="form-row p-1">
                        <div class="form-group col-md-6">
                            <label for="section_image">@langucw(' image')</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="category_image">
                                <label class="custom-file-label" for="section_image">@langucw('choose file')</label>
                            </div>
                        </div>
    
                    </div>
    
    
                    <div class="form-row p-1">
                        <div class="form-group col-md-6">
                            <!-- Default input -->
                            <label for="section_title_ar">@langucw('title ar')</label>
                            <input type="text" name="name_ar" value="{{ old('section_title_ar') }}" id="section_title_ar"
                                class="form-control">
                        </div>
                        <div class="form-group col-md-6 p-1">
                            <!-- Default input -->
                            <label for="section_title_en">@langucw('title en')</label>
                            <input type="text" name="name_en" value="{{ old('section_title_en') }}" id="section_title_en"
                                class="form-control">
                        </div>
                    </div>
    
                    <div class="form-row p-1">
                        <div class="form-group col-md-6">
                            <!-- Default input -->
                            <label for="short_title_ar">@langucw('content ar')</label>
                            <input type="text" name="content_ar" value="{{ old('ShortcutName') }}" id="short_title_ar"
                                class="form-control">
                        </div>
                        <div class="form-group col-md-6 p-1">
                            <!-- Default input -->
                            <label for="short_title_en">@langucw('content en')</label>
                            <input type="text" name="content_en" value="{{ old('ShortcutNameEN') }}" id="short_title_en"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-3 p-1">
                        <button type="submit" class="btn btn-danger">{{ trans('general.save') }}</button>
                    </div>
                </div>


            </div>




        </form>
    </section>
@endsection
@section('scripts')
@endsection