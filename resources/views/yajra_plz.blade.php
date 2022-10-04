@if($data->plz < 2000)
    <span class="badge badge-pill badge-danger">{{$data->plz}}</span>
@else
{{ $data->plz }}
@endif
