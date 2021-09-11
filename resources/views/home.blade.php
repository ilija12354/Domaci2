@extends('includes.master')


@section('nesto')
@foreach($users as $user)
            {{$user->ime}} {{$user->prezime}}
        @endforeach

@stop