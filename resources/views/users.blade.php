@extends('includes.master')


@section('nesto')
<div>
<table  class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Ime</th>
            <th scope="col">Prezime</th>
            <th scope="col">Email</th>
            <th scope="col">Promeniti korisnika</th>
        </tr>
    </thead>
    <tbody>
    @foreach($korisnici as $user)
        <tr>
            <td scope="row"> {{$user->ime}}</td>
            <td>  {{$user->prezime}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{route('viewUser',$user->id)}}">Videti korisnika</a></td>
        </tr>
    @endforeach
    </tbody>

</table>
</div>
<div>
<form class="form-signin" action="{{route('createUser')}}"method="get">

@csrf     
  <button class="btn btn-lg btn-primary " type="submit">Dodajte novog korisnika</button>   
</form>
</div>
             {{$korisnici->links()}}

@stop