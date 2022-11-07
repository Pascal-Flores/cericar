La liste des réservations trouvées est la suivante :<br>
<?php foreach( $context->foundReservations as $reservation) {
    echo "id reservation : $reservation->id, ville départ : {$reservation->voyage->trajet->depart}, ville arrivee : {$reservation->voyage->trajet->arrivee}, prix reservation : {$reservation->voyage->tarif} <br>";
}
?>