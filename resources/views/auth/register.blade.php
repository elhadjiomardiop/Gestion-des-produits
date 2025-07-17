@extends('layout')

@section('tilte',"S'inscrire")

@section('content')

    <div>
        @if(session('success'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Success !</strong>
            <span class="block sm:inline"> {{ session('sucess') }}</span>

          </div>

        @endif
    </div>

    <div class="mt-6 mb-auto p-6 bg-white rounded-lg shadow-md">
        <form action="{{ route('registration.register') }}" method="POST" class="mb-6">
        @csrf

  <div class="mb-3">
    <label for="name" class="form-label">Entrez votre adresse nom</label>
    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    @error('name')
      <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
  </div>
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
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmez votre mot de passe</label>
        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
        
  <button type="submit" class="btn btn-primary">S'inscrire</button>

  <p class="my-2">
    Déja un compte ?
    <a href="{{ route('login') }}" class="color-red">Veuillez se connecter ici</a>
  </p>
</form>
    </div>
@endsection

