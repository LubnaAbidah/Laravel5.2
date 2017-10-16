@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  	@include ('_partial.flash_message')
		<h4>Detail Pengaturan Akun  {{ Auth::user()->name }}</h4>
			<div class="panel panel-danger">
			  <div class="panel-heading">Data Profil</div>
			  <div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>Nama Pengguna</th>
							<td> {{ Auth::user()->name }}</td>
						</tr>
						<tr>
							<th>Email Pengguna</th>
							<td> {{ Auth::user()->email }}</td>
						</tr>
						<tr>
							<th>Hak Akses</th>
							<td> {{ Auth::user()->level }}</td>
						</tr>
					</table>
 				{{ link_to('profilku/'. Auth::user()->id . '/edit', '', ['class' => 'btn btn-warning btn-sm glyphicon glyphicon-edit', 'data-toggle' => 'tooltip', 'data-placement' => 'bootom', 'title' => 'EDIT']) }}
 			  </div>
			</div>
  </div>
</div>	
@endsection