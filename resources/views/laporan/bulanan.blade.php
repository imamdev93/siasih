@extends('layouts.app')
@section('content')
    <div class="row">
        @include('notification')
        <div class="col-lg-12">
            @livewire('monthly-report-index')
        </div>
    </div>
@endsection
