@extends('guru.layout')

@section('title', 'Dashboard Guru')

@section('content')
<div class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-2xl font-bold text-[#5F8B4C]">
        Selamat Datang, {{ Auth::user()->name }} 👋
    </h2>
    <p class="mt-2 text-gray-600">Ini adalah dashboard khusus untuk guru.</p>

</div>
@endsection
