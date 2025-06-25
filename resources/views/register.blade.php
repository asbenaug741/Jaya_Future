@extends('layout.main')

@section('container')
<main>
    <div class="sign-up container ">
        @livewire('multi-step-form')
    </div>
</main>
@include('components.footer')
@endsection