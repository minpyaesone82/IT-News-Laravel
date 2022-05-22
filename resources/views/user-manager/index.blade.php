@extends('layouts.app')
@section('title') User Manger @endsection

@section('head')
   
@endsection
@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </x-breadcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th >Email</th>
                                    <th>Role</th>
                                    <th class="text-nowrap">Control</th>
                                    <th class="text-nowrap">Create At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td class="text-nowrap">{{$user->email}}</td>

                                        <td>{{$user->role}}</td>
                                        <td class="text-nowrap">
                                            @if ($user->role == 1)
                                            <form class="d-inline-block" action="{{route('user-manager.makeAdmin')}}" id="form{{$user->id}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="return askConfirm({{$user->id}})"> Make Admin</button>
                                            </form> 

                                            @if ($user->isBaned == 1)
                                                <span class="">Banned</span>
                                            @else
                                                <form class="d-inline-block" action="{{route('user-manager.banUser')}}" id="formBan{{$user->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="return banUser({{$user->id}})">Ban User</button>
                                                </form> 
                                            @endif
                                            
                                            @endif

                                           
                                            
                                        </td>
                                        <td class="text-nowrap">{{$user->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    <script>
        function askConfirm(id){
            Swal.fire({
            title: 'Are you sure to upgrade?',
            text: "if you upgrade the role,so can make everything like a Admin. Are you sure!! ",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Upgraded!',
                'Role is updated',
                'success'
                )
                setTimeout(function (){
                    $("#form"+id).submit();
                },1500)
            }
            })
        }

        function banUser(id){
            Swal.fire({
            title: 'Are you sure ban User?',
            text: "if you ban user, so  can't action like a User ",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Ban User!',
                'Ban like par pi',
                'success'
                )
                setTimeout(function (){
                    $("#formBan"+id).submit();
                },1500)
            }
            })
        }
    </script>
@endsection