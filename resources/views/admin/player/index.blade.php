@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Player Lists</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Player List</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <a href="{{ route('admin.player.create')}}" class="btn btn-primary">Create</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table id="mytable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PlayerId</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Balance</th>
                                    <th>CreatedAt</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->user_name}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{ number_format(optional($user->wallet)->balance, 2) }}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        @if ($user->status == 2)
                                        <a onclick="event.preventDefault(); document.getElementById('banUser-{{ $user->id }}').submit();" class="me-2" href="#">
                                            <i class="fas fa-user-slash text-danger" style="font-size: 20px;"></i>
                                        </a>
                                        @elseif($user->status == 1)
                                        <a onclick="event.preventDefault(); document.getElementById('banUser-{{ $user->id }}').submit();" class="me-2" href="#">
                                            <i class="fas fa-user-check text-success" style="font-size: 20px;"></i>
                                        </a>
                                        @else
                                        <a href="" class="me-2" href="#">
                                            <i class="fas fa-user-check text-warning" style="font-size: 20px;"></i>
                                        </a>
                                        @endif
                                        <form class="d-none" id="banUser-{{ $user->id }}" action="{{ route('admin.player.ban', $user->id) }}" method="post">
                                            @csrf
                                        </form>
                                            <a href="{{route('admin.player.changePassword', $user->id)}}" class="btn btn-info btn-sm"><i class="fas fa-lock-open"></i></a>
                                            <a href="{{route('admin.player.edit', $user->id)}}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit" style="font-size: 20px;"></i>Edit
                                            </a>

                                            <a href="{{route('admin.logs', $user->id)}}" class="btn btn-success btn-sm">
                                                <i class="fas fa-sign-in-alt" style="font-size: 20px;"></i>Logs
                                            </a>
                                            <a href="{{route('admin.player.deposit', $user->id)}}"
                                               class="btn btn-warning btn-sm"><i class="fas fa-plus"></i>Dep</a>
                                            <a href="{{route('admin.player.withdraw', $user->id)}}"
                                               class="btn btn-primary btn-sm"><i class="fas fa-minus"></i>With</a>

                                    </td>
                                </tr>
                                @endforeach

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
