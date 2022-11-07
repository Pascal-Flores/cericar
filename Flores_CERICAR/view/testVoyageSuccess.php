La liste des voyages trouvés est la suivante : <br>

<?php foreach( $context->foundVoyages as $voyage) {
    echo "id voyage : $voyage->id, trajet : { depart : {$voyage->trajet->depart}, arrivee : {$voyage->trajet->arrivee}, distance : {$voyage->trajet->distance} } <br>";
}
?>