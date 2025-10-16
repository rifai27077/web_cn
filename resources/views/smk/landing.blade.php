
@extends('layouts.app')

@section('content')

@include('smk.components.hero')
  @include('smk.components.sambutan')
  @include('smk.components.visi-misi')
  @include('smk.components.bidang-studi')
  @include('smk.components.jurusan')
  @include('smk.components.prestasi')
  @include('smk.components.ekstrakurikuler')
  @include('smk.components.kontak-info')
@endsection
