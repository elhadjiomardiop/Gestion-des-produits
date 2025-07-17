@extends('layout')

@section('tilte',"Se connecter")

@section('content')

    <div>
        @if($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline"> {{ $errors->first() }}</span>
          </div>

        @endif
    </div>

    <div class="mt-6 mb-auto p-6 bg-white rounded-lg shadow-md">
        <form action="{{ route('login.submit') }}" method="POST" class="mb-6">
        @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Entrez votre adresse email</label>
    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    @error('email')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Entrez votre mot de passe</label>
    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
    @error('password')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>

  <p class="my-2">
    Pas de compte ?
    <a href="{{ route('register') }}" class="color-red">S'inscrire des maintenant</a>
  </p>
</form>
    </div>
@endsection

