@extends('layouts.app')

<?php 
session_start();
$loggedDoctor = $_SESSION["loggedDoctor"];
?>

@section('content')
<div class="container">


    <h2 class="fs-4 text-secondary my-4">
        Il tuo profilo {{ $_SESSION["loggedDoctor"]->name }}
    </h2>
    
</div>
@endsection
