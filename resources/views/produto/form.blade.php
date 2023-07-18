@extends('layouts.base')
@section('content')
<h1>Editar Cargo</h1>
<form action="{{ route('cargo.update', ['id'=>$cargo->id_cargo]) }}" method="post"
enctype="multipart/form-data">

{{-- precisa disso pro laravel ler --}}
@csrf

<label for="cargo">Cargo</label>
<input type="text" name="cargo" id="cargo"

{{-- TERNÁRIO (IF em uma linha só) --}}
value="{{
    $cargo && $cargo->cargo !='' ?
    $cargo->cargo:old(cargo)
    }}">

    <input type="submit" value="Atualizar">

</form>
@endsection
@section('scripts')
@endsection
