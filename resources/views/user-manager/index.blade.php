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

                                            <button class="btn btn-sm btn-info" onclick="return changePassword({{$user->id}},'{{$user->name}}')">Change Password</button>

                                            @if ($user->isBaned == 1)
                                                
                                                <form class="d-inline-block" action="{{route('user-manager.removeBan')}}"  id="removeBan{{$user->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="return removeBan({{$user->id}})">Remove Ban</button>
                                                </form> 
                                            @else
                                                <form class="d-inline-block" action="{{route('user-manager.banUser')}}" id="formBan{{$user->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="return banUser({{$user->id}})">Ban User</button>
                                                </form> 
                                            @endif

                                           
                                            
                                            @endif

                                           
                                            
                                        </td>
                                        <td class="text-nowrap">
                                            <small><i class="feather feather-calendar"></i> {{$user->created_at->format('d M Y')}}</small>
                                            <br>
                                            <small><i class="feather feather-clock"></i> {{$user->created_at->format('h:i a')}}</small>
                                        </td>
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

        function removeBan(id){
            Swal.fire({
            title: 'Are you sure to remove ban?',
            text: "if you do the store, this person will get the functionailty of a User ",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Remove Ban!',
                'Remove lote lite pr p',
                'success'
                )
                setTimeout(function (){
                    $("#removeBan"+id).submit();
                },1500)
            }
            })
        }

        function changePassword(id, name)
        {
            let url = '{{route('changePassword')}}';
            Swal.fire({
            title: 'Change Password for ' + name,
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off',
                required : 'required',
                minlength : 4
            },
            showCancelButton: true,
            confirmButtonText: 'Change Password',
            showLoaderOnConfirm: true,
            preConfirm: function(newPassword){
               
                $.post(url,{
                    id : id,
                    password : newPassword,
                    _token : '{{csrf_token()}}'
                }).done(function (data){
                    if(data.status == 200){
                        Swal.fire({
                            icon : 'success',
                            title : data.message,

                        });
                    }else{
                        Swal.fire('error',data.message.password[0],'error');
                    }
                })
            }

            })

        }
    </script>
@endsection