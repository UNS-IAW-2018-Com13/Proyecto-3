<?php
$jugador = "{'nombre'='{$_GET['InNombre']}',
                'puntaje'=0,
                'idFavorito'=0,  
                'favorito'=0,
                'mazos'=[
                    '{$_GET['InNombre']}1',
                    '{$_GET['InNombre']}2',
                    '{$_GET['InNombre']}3'
                        ]}";
echo $jugador;
?>
<br/>
<br/>
<?php
$cards = explode(chr(13), $_GET['InDeck1']);
$mazo = "{'nombre'='{$_GET['InNombre']}1',
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
$cards = explode(chr(13), $_GET['InDeck2']);
$mazo = "{'nombre'='{$_GET['InNombre']}2',
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
$cards = explode(chr(13), $_GET['InDeck3']);
$mazo = "{'nombre'='{$_GET['InNombre']}3',
    'clase'= '" . substr($cards[1], 10) . "',
    'mazos'= [";
for ($i = 4; $i < sizeof($cards) - 5; $i++) {
    $mazo .= "['" . substr($cards[$i], 10) . "', " . substr($cards[$i], 3, 1) . "],";
}
$mazo = substr($mazo, 0, -1) . "]}";
echo $mazo . "<br/>";
?>