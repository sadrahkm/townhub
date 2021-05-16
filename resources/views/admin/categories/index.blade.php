@extends('layouts.admin')
@section('content')
    <!-- Vertical borders -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">List of Categories</h5>
        </div>
        @if(!$categories && !empty($categories))
            <div class="panel-body"> There is No Category</div>
        @else
            <div class="table-responsive">
                <table class="table table-columned">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <ul class="icons-list">
                                    <li class="text-primary-600"><a href="{{ route('admin.categories.edit',$category->id) }}"><i
                                                class="icon-pencil7"></i></a></li>
                                    <li class="text-danger-600"><a href="{{ route('admin.categories.delete',$category->id) }}"><i
                                                class="icon-trash"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
