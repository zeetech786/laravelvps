@if($data->city=='Rabwah')
<span class="badge badge-pill badge-primary">{{$data->city}}</span>
@elseif($data->city=='Syke' )
    <span class="badge badge-pill badge-warning">{{$data->city}}</span>
@else
    {{$data->city}}
@endif
