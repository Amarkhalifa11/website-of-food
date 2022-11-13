@extends('admin.admin_master')
@section('content')
    <h1 class="text-center mt-5">ALL USERS</h1>
    <h2 class="text-center mt-5 mb-5">welcome : {{Auth::user()->name}}</h2>


    <div class="row">
        <div class="col-lg-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($users as $user)
                                
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
            
        </div>
        </div>
@endsection