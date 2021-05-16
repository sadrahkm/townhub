@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6">

            <!-- Collapsible list -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">All Users</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <ul class="media-list media-list-linked">
                    @foreach($users as $user)
                        <li class="media">
                            <div class="media-link cursor-pointer" data-toggle="collapse"
                                 data-target="#{{ $user->id }}">
                                <div class="media-left"><img
                                        src="{{ $user->avatar_name }}"
                                        class="img-circle img-md" alt="{{ $user->name }}"></div>
                                <div class="media-body">
                                    <div class="media-heading text-semibold">{{ $user->name }}</div>
                                    <span class="text-muted">{{ $user->website }}</span>
                                </div>
                                <div class="media-right media-middle text-nowrap">
                                    <i class="icon-menu7 display-block"></i>
                                </div>
                            </div>

                            <div class="collapse" id="{{ $user->id }}">
                                <div class="contact-details">
                                    <ul class="list-extended list-unstyled list-icons">
                                        <li><i class="icon-pin position-left"></i> {{ $user->address }}</li>
                                        <li><i class="icon-mail5 position-left"></i> <a
                                                href="{{ $user->email }}">{{ $user->email }}</a></li>
                                        <li><i class="icon-phone position-left"></i>{{ $user->phone }}</li>
                                        <li><i class="icon-notebook position-left"></i>{{ $user->notes }}</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div style="text-align:center; padding: 30px 0">
                    <ul class="pagination pagination-separated">
                        <li><a href="#">&lsaquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="disabled"><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&rsaquo;</a></li>
                    </ul>
                </div>

            </div>
            <!-- /collapsible list -->

        </div>
        <div class="col-md-6">

            <!-- Collapsible list -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Admins</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <ul class="media-list media-list-linked">
                    @foreach($admins as $admin)
                        <li class="media">
                            <div class="media-link cursor-pointer" data-toggle="collapse"
                                 data-target="#{{ $admin->id }}">
                                <div class="media-left"><img
                                        src="{{ $admin->avatar_name }}"
                                        class="img-circle img-md" alt="{{ $admin->name }}"></div>
                                <div class="media-body">
                                    <div class="media-heading text-semibold">{{ $admin->name }}</div>
                                    <span class="text-muted">{{ $admin->website }}</span>
                                </div>
                                <div class="media-right media-middle">
                                    <span class="label label-warning">Admin</span>
                                </div>
                                <div class="media-right media-middle text-nowrap">
                                    <i class="icon-menu7 display-block"></i>
                                </div>
                            </div>

                            <div class="collapse" id="{{ $admin->id }}">
                                <div class="contact-details">
                                    <ul class="list-extended list-unstyled list-icons">
                                        <li><i class="icon-pin position-left"></i> {{ $admin->address }}</li>
                                        <li><i class="icon-mail5 position-left"></i> <a
                                                href="{{ $admin->email }}">{{ $admin->email }}</a></li>
                                        <li><i class="icon-phone position-left"></i>{{ $admin->phone }}</li>
                                        <li><i class="icon-notebook position-left"></i>{{ $admin->notes }}</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div style="text-align:center; padding: 30px 0">
                    <ul class="pagination pagination-separated">
                        <li><a href="#">&lsaquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="disabled"><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&rsaquo;</a></li>
                    </ul>
                </div>

            </div>
            <!-- /collapsible list -->

        </div>

    </div>

@endsection
