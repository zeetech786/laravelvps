{{--<div>
<a href="{{ route('yajra.show',$data->id)}}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i></i> view</a>
<a href="{{ route('yajra.edit',$data->id)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<a href="{{ route('yajra.destroy',$data->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> delete</a>
</div>--}}
<div class="btn-group btn-group-sm">
    <a href="{{ route('yajra.show',$data->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
    <a href="{{ route('yajra.edit',$data->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
    <a href="{{ route('yajra.destroy',$data->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
</div>
{{--
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary">Left</button>
    <button type="button" class="btn btn-secondary">Middle</button>
    <button type="button" class="btn btn-secondary">Right</button>
</div>
--}}
