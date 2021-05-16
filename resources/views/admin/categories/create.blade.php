@extends('layouts.admin')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <div class="panel-title">
                Create New Category
            </div>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                @csrf
                <fieldset class="content-group">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Enter Category Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Category Name"
                                   value="{{ old('name', isset($category->name) ? $category->name : '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Upload Category Image</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i
                                class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
