@php
  $i=0;
@endphp

@while($i < 6)
  @php
    $i++;
  @endphp
  <h{{$i}}>{{$i}}番目です。</h{{$i}}>
@endwhile