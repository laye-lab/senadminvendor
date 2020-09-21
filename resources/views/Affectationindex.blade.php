@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->


<center>
<section class="content" >
  <div class="container-fluid">

    <div class="row" style="position:relative; top:100px; left:10%;">
      <!-- left column -->
      <div class="col-md-10" >
        <form method="POST" action="{{ route('homeCommandepost') }}">
          @csrf
        <!-- general form elements disabled -->

        @livewire('livesearch')
        </section>
</center>
@endsection
