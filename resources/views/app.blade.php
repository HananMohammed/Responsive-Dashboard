@extends('admin.layouts.app')
@section('title' ,'profile')
@section('header-css')
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<style>
.content.d-flex.flex-column.flex-column-fluid{
    margin-top: -90px;
    background-color: none;
}
</style>
@endsection
@section('content')

<div class="font-sans antialiased">
    @inertia
</div>
@endsection
@section('footer-js')
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
<script>
    $(document).ready(function () {
      $('.bg-white.border-b.border-gray-100').remove();
      $('header.bg-white.shadow').remove();
    })
</script>
@endsection
