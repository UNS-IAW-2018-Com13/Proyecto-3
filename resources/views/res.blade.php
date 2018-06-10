@extends('layouts.app')

@section('content')
<div class="container">
    <?php
    if (array_key_exists("msg", $jugador)) {
        echo "<label>" . $jugador->msg . "</label><br/>";
    } else {
        echo "<label>" . $jugador->nombre . "</label><br/>
        <label>" . $jugador->mazos[0] . "</label><br/>
        <label>" . $jugador->mazos[1] . "</label><br/>
        <label>" . $jugador->mazos[2] . "</label><br/><br/>";
    }
    ?>
    <a href="/">
        <button class="btn btn-primary">Volver</button>
    </a><br/>
</div>
@endsection