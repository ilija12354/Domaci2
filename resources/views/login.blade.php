@extends('includes.prijava')


@section('nesto2')
@include('includes.validation')
<form class="form-signin" action="{{route('signin')}}"method="post">

    @csrf     
      <h1 class="h3 mb-3 font-weight-normal">Ulogujte se</h1>
      <label for="inputEmail" class="sr-only">Email adresa</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
      <label for="inputPassword" class="sr-only">Sifra</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="login">Ulogujte se</button>   
</form>
<form class="form-signin" action="{{route('createUser')}}"method="get">
    @csrf     
      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrujte se</button>   
</form>

@stop