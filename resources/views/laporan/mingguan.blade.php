@extends('layouts.app')
@section('content')
    <div class="row">
        @include('notification')
        <div class="col-lg-12">
            @livewire('weekly-report-index')
        </div>
    </div>
@endsection
