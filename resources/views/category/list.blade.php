<table class="table table-hover table-bordered table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Titile</th>
            
                <th>Post Owner</th>
            
            <th>Control</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach (\App\Category::with('user')->get() as $s)
            <tr>
                <td>{{$s->id}}</td>
                <td>{{substr($s->title,0,25)}}</td>
                
                <td>
                    
                    @isset($s->getUser)
                    {{$s->getUser->name}}
                    @else
                    Unknown
                    @endisset
                
                </td>
                
                <th class="text-nowrap">
                    <a href="{{route('category.edit',$s->id)}}" class="btn btn-primary btn-sm"> <i class="feather feather-edit"></i> Edit</a>
                    <form action="{{route('category.destroy',$s->id)}}" method="post" class="d-inline-block" >
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure delete {{$s->title}} category ?')"> <i class="feather feather-trash-2"></i> Delete</button>

                    </form>
                </th>
                <td>{{$s->created_at->format('d M Y / h:i A')}}</td>
            </tr>
        @endforeach
    </tbody>
</table>