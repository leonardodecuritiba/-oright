@extends('guest.layouts.app')

@section('title', 'Home')

@section('page_header')

    @include('guest.layouts.inc.header')

@endsection

@section('page_content')

    <!-- Main Content
    ========================================-->

    <main class="entry-main">
        @include('commons.terms-text')

    </main>


@endsection


@section('script_content')


@endsection