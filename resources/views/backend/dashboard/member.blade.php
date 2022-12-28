@extends('layouts.header')

@section('content')

<div class="content">
 <h2>
    Hello, {{Auth::user()->name ?? ''}}
 </h2>

</div>

@endsection
