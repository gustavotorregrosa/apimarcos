<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>@yield('titulo')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('semantic/css/semantic.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('semantic/css/api.css') }}">
	@yield('css-adicional')
</head>
<body>
	<header>
		@component('navbar')
		@endcomponent
	</header>
	<main>
		<div class="ui container">
		  @yield('mensagem-generica')
		  @yield('conteudo-principal')
		</div>
	</main>
	<footer>
		@component('footer')
		@endcomponent
	</footer>		
	<script type="text/javascript" src="{{ asset('semantic/js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('semantic/js/semantic.min.js') }}"></script>
	@yield('script-adicional')
</body>
</html>