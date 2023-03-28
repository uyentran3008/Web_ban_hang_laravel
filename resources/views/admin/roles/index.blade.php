@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
<div class="card">
    @if (session('massage'))
        <h1 class="text-primary">{{session('manager')}}</h1>
        
    @endif
    <h1 class="text-primary"> Role List</h1>
    <div>
        <a href="{{route('roles.create')}}" class="btn btn-primary"> Create</a>
    </div>
    
    <div>
        <table class="table table-hover">
            <th>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>DisplayName</th>
                    <th>Action</th>
                </tr>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>
                            <a href="{{route('roles.edit',$role->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('roles.destroy',$role->id)}}"  id="form-delete{{$role->id}}" method="POST">
                                @csrf
                                @method('delete')
                                
                            </form>
                            <button class="btn btn-delete btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </th>
        </table>
        {{$roles->links()}}
    </div>
</div>
    
@endsection