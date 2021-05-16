@extends('layouts.admin')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <div class="panel-title">
                Create New Category
            </div>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post"
                  action="{{ route("admin.city.$action",$action == 'update' ? $city->id : '') }}"
                  enctype="multipart/form-data">
                @csrf
                @if($action == 'update')
                    @method('PUT')
                @endif
                <fieldset class="content-group">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Enter City Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Category Name"
                                   value="{{ old('name', isset($city->name) ? $city->name : '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Styled file input</label>
                        <div class="col-lg-10">
                            <input type="file" name="image" class="file-styled">
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
