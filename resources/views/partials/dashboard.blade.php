@extends('layouts.app')
@section('title','Escritorio - '.config('app.name'))
@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-3 animated bounceInUp">
				<div class="row">
					<div class="iconfo col-md-5">
						<h3>{{ $total['sales'] }}</h3>
						<h4 class="perq">Ventas</h4>
					</div>
					<div class="iconfo col-md-5">
						<span style="font-size: 75px; color: #0094d0; padding: 7px;" class="fa fa-desktop animated infinite pulse"></span>
					</div>
					<div class="incofo2 col-md-10 text-center">
						<a class="verm" href="{{route('sales.index')}}">Ver más<span class="glyi glyphicon glyphicon-circle-arrow-right"></span></a>
					</div>
				</div>
			</div>
			<div class="col-md-3 animated bounceInUp">
				<div class="row">
					<div class="iconfo col-md-5">
						<h3>{{ $total['users'] }}</h3>
						<h4 class="perq">Usuarios</h4>
					</div>
					<div class="iconfo col-md-5">
						<span style="font-size: 75px; color: #0094d0; padding: 7px;" class="fa fa-users animated infinite pulse"></span>
					</div>
					<div class="incofo2 col-md-10 text-center">
						<a class="verm" href="#">Ver más<span class="glyi glyphicon glyphicon-circle-arrow-right"></span></a>
					</div>
				</div>
			</div>
			<div class="col-md-3 animated bounceInUp">
				<div class="row">
					<div class="iconfo col-md-5">
						<h3>{{ $total['roles'] }}</h3>
						<h4 class="perq">Roles</h4>
					</div>
					<div class="iconfo col-md-5">
						<span style="font-size: 75px; color: #0094d0; padding: 7px;" class="fa fa-circle animated infinite pulse"></span>
					</div>
					<div class="incofo2 col-md-10 text-center">
						<a class="verm" href="#">Ver más<span class="glyi glyphicon glyphicon-circle-arrow-right"></span></a>
					</div>
				</div>
			</div>
			<div class="col-md-3 animated bounceInUp">
				<div class="row">
					<div class="iconfo col-md-5">
						<h3>{{ $total['permissions'] }}</h3>
						<h4 class="perq">Permisos</h4>
					</div>
					<div class="iconfo col-md-5">
						<span style="font-size: 75px; color: #0094d0; padding: 7px;" class="fa fa-cogs animated infinite pulse"></span>
					</div>
					<div class="incofo2 col-md-10 text-center">
						<a class="verm" href="#">Ver más<span class="glyi glyphicon glyphicon-circle-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</div>
</div>
@endsection