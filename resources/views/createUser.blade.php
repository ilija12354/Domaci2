@extends('includes.prijava')


@section('nesto2')


    @include('includes.validation')

    
 

<form class="form-signin" method="post" action="{{route('createUser')}}">
   @csrf
   <h1 class="h3 mb-3 font-weight-normal">Napravite novog korisnika</h1>
    <input type="text" class="form-control" name="ime" placeholder="ime" value="{{old('ime')}}">
    
    <input type="text" class="form-control" name="prezime" placeholder="prezime" value="{{old('prezime')}}">

    <input type="email" class="form-control" name="email" placeholder="email" value="{{old('email')}}">
   
    <input type="password" class="form-control" name="sifra" placeholder="sifra" value="{{old('sifra')}}">
   
    <button type="submit" class="btn btn-lg btn-primary btn-block">Napravi</button>
</form>



@stop