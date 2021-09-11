@extends('includes.master')


@section('nesto')


@include('includes.validation')


<form method="post" action="{{route('updateUser', $user->id)}}" class="form-signin">
   @csrf
   <h1 class="h3 mb-3 font-weight-normal">Naziv korisnika: {{$user->ime}} {{$user->prezime}}</h1>
    <input type="text" class="form-control" name="ime" placeholder="ime" >
    <br>
    <input type="text" class="form-control" name="prezime" placeholder="prezime" >
    <br>
    <input type="email" class="form-control" name="email" placeholder="email" >
    <br>
    <input type="password" class="form-control" name="password" placeholder="sifra" >
    <br>
    <button type="submit" class="btn btn-lg btn-primary btn-block">sacuvaj promene</button>
</form>

<form action="{{route('deleteUser', $user->id)}}" method="post" class="form-signin">
    @csrf
    <button type="submit" class="btn btn-lg btn-primary btn-block" > izbrisi korisnika</button>

</form>

@stop