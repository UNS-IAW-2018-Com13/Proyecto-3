<?php

$jugador = "{'nombre'='{$_POST['InNombre']}',
                'puntaje'=0,
                'idFavorito'=0,  
                'favorito'=0,
                'mazos'=[
                    '{$_POST['InNombre']}1',
                    '{$_POST['InNombre']}2',
                    '{$_POST['InNombre']}3'
                        ]}";
echo $jugador;
?>
<br/>
<br/>
<?php
$cards = explode(chr(13), $_POST['InDeck1']);
$mazo = "{'nombre'='{$_POST['InNombre']}1',
    'clase'= '" . substr($cards[1], 10) . "',
    'mazos'= [";
for ($i = 4; $i < sizeof($cards) - 5; $i++) {
    $mazo .= "['" . substr($cards[$i], 10) . "', " . substr($cards[$i], 3, 1) . "],";
}
$mazo = substr($mazo, 0, -1) . "]}";
echo $mazo . "<br/>";
?>
<br/>
<?php
$cards = explode(chr(13), $_POST['InDeck2']);
$mazo = "{'nombre'='{$_POST['InNombre']}2',
    'clase'= '" . substr($cards[1], 10) . "',
    'mazos'= [";
for ($i = 4; $i < sizeof($cards) - 5; $i++) {
    $mazo .= "['" . substr($cards[$i], 10) . "', " . substr($cards[$i], 3, 1) . "],";
}
$mazo = substr($mazo, 0, -1) . "]}";
echo $mazo . "<br/>";
?>
<br/>
<?php
$cards = explode(chr(13), $_POST['InDeck3']);
$mazo = "{'nombre'='{$_POST['InNombre']}3',
    'clase'= '" . substr($cards[1], 10) . "',
    'mazos'= [";
for ($i = 4; $i < sizeof($cards) - 5; $i++) {
    $mazo .= "['" . substr($cards[$i], 10) . "', " . substr($cards[$i], 3, 1) . "],";
}
$mazo = substr($mazo, 0, -1) . "]}";
echo $mazo . "<br/>";
?>