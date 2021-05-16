@extends('layouts.admin')
@section('content')
    <!-- Vertical borders -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">List of Cities</h5>
        </div>
        @if(!$cities && !empty($cities))
            <div class="panel-body"> There is No City</div>
        @else
            <div class="table-responsive">
                <table class="table table-columned">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->image }}</td>
                            <td>
                                <ul class="icons-list">
                                    <li class="text-primary-600"><a href="{{ route('admin.city.edit',$city->id) }}"><i
                                                class="icon-pencil7"></i></a></li>
                                    <li class="text-danger-600"><a class="requestSendBy" data-method="delete" href="{{ route('admin.city.destroy',$city->id) }}"><i
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
