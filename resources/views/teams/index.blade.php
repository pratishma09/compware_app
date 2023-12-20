@extends('template')
@section('title','Our team')

@section('content')
<div>
    <h1>Our team</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
</div>