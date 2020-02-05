@if(count($errors) > 0)
<ul>
  @foreach ($errors->all() as $err)
    <li class="text-danger">{{$err}}</li>
  @endforeach
</ul>
@endif