<hr>
<h3>string</h3>
<p class="text-full">{{$string}}</p>
<br><br>
<h2>{{$type}}</h2>

@foreach($object as $key => $value)
    <div>
        <p><b>{{$key}}</b> : {{$value}}</p>
    </div>
@endforeach


