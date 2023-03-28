@extends('admin.layouts.app')
@section('title', 'Category')
@section('content')
<div class="card">
    @if (session('message'))
        <h1 class="text-primary">{{session('message')}}</h1>
        
    @endif
    <h1 class="text-primary"> Category List</h1>
    <div>
        <a href="{{route('categories.create')}}" class="btn btn-primary"> Create</a>
    </div>
    
    <div>
        <table class="table table-hover">
            <th>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->parent_name }}</td>
                        <td>
                            <a href="{{route('categories.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('categories.destroy',$item->id)}}"  id="form-delete{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-delete btn-danger" data-id="{{$item->id}}" >Delete</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </th>
        </table>
        {{$categories->links()}}
    </div>
</div>
    
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="" crossorigin="anonymous"></script>
<script>
    $(()=>{
        $(document).on('click', '.btn-delete', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            if(confirm('detele it')){
                $(`#form-delete${id}`).submit();
            }
        })
    })
</script>
@endsection