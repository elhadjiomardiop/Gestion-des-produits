@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Bienvenue sur Gestion de Produits</h1>
    <p>Veuillez vous inscrire si vous n'avez pas un compte sinon vous pouvez vous connecter pour voir la liste des produits</p>
    <body class="">
        <header class="flex items-center justify-between p-6 bg-white dark:bg-[#191400]">
            @if (Route::has('login'))
                <nav class="">
                    @auth
                        
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Se connecter
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                S'inscrire
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
</div>
@endsection
