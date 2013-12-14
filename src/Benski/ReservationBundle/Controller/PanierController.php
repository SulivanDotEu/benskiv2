<?php

namespace Benski\ReservationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Benski\ReservationBundle\Entity\Panier;
use Benski\ReservationBundle\Entity\SejourReserve;
use Benski\ReservationBundle\Entity\AppartementReserve;
use Benski\ReservationBundle\Entity\PackReserve;
use Benski\ReservationBundle\Entity\ReservationSejour;

/**
 * L'utilisateur du site peut réaliser 3 type de réservations :
 *      - un sejour (ceci comprend destination, date, appartements et packs)
 *      - un appartement (avec ou sans pack? A priori sans TODO -> SI, on peut)
 *      - un pack pour une date donnée à une destination donnée
 */
class PanierController extends Controller {

    public static $PANIER = 'panier';

    public function indexAction($name) {
        return $this->render('BenskiReservationBundle:Default:index.html.twig', array('name' => $name));
    }

    public function afficherAction() {
        $panier = self::getPanier();

        return $this->render('BenskiReservationBundle:Panier:afficher.html.twig', array(
                    'entity' => $panier,
        ));
    }

    public function resetAction() {
        $this->resetPanier();
        return $this->redirect($this->generateUrl('panier_afficher'));
    }

    /**
     * Quand l'utilisateur choisi un séjour, un bouton "ajouter dans le panier" est affiché
     * Cette fonction est appelé quand l'utilisateur clique sur ce bouton
     * 
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",    class="BenskiCatalogueBundle:Destination")
     * @ParamConverter("appartement",   class="BenskiCatalogueBundle:Appartement")
     * @ParamConverter("pack",          class="BenskiCatalogueBundle:Pack")
     */
    public function ajouterSejourReserveAction($sejour, $destination, $appartement, $pack, $nbrPersonnes) {
        // verifier si le pack est contneu dans le séjour
        // vérifier si l'appartement se trouve dans la destinantion
        //$this->resetPanier();
        $panier = self::getPanier();
        $sejourReserve = new SejourReserve();
        $sejourReserve->setSejour($sejour);
        $sejourReserve->setDestination($destination);
        $appartementReserve = new AppartementReserve();
        $appartementReserve->setAppartement($appartement);
        $appartementReserve->setNombrePersonnes($nbrPersonnes);
        $appartementReserve->setPrix($appartement->getPrix($sejour, $nbrPersonnes));
        $packReserve = new PackReserve();
        $packReserve->setPack($pack);
        $appartementReserve->setPackReserve($packReserve);
        $sejourReserve->addAppartementsReserve($appartementReserve);
        //$packReserve = new PackReserve();
        //$packReserve->setPack($pack);
        //$appartementReserve->setPackReserve($packReserve);
        $panier->addSejourReserve($sejourReserve);
        $appartementReserve->init();
        //var_dump($panier->getReservations()[0]->getSejourReserve());
        return $this->redirect($this->generateUrl('panier_afficher'));
    }
    
    /**
     * Quand l'utilisateur choisi un séjour, un bouton "ajouter dans le panier" est affiché
     * Cette fonction est appelé quand l'utilisateur clique sur ce bouton
     * 
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",    class="BenskiCatalogueBundle:Destination")
     */
    public function supprimerAppartementReserveAction($sejour, $destination, $numero){
        $panier = $this->getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $sejourReserve = $reservationSejour->getSejourReserve();
        $appartementsReserves = $sejourReserve->getAppartementReserveByNumero($numero);
        $sejourReserve->removeAppartementsReserve($appartementsReserves);
        return $this->redirect($this->generateUrl('panier_afficher'));
    }

    /**
     * 
     * @param \Benski\ReservationBundle\Controller\Sejour $reservation
     */
    public function commanderSejourAction(Sejour $sejour) {
        $panier = self::getPanier();
        $reservationSejour = $panier->getReservationSejourBySejour($sejour);
        // maintenant que j'ai ma réservation, je peux commencer la réservation;
        // on redirige vers la reservation proprement dite
    }

    public static function getPanier() {
        $session = new Session();
        $panier = $session->get(self::$PANIER);
        if ($panier == null) {
            $panier = new Panier();
            $session->set(self::$PANIER, $panier);
        }
        return $panier;
    }

    protected function resetPanier() {
        $session = new Session();
        $panier = new Panier();
        $session->set(self::$PANIER, $panier);
        return $panier;
    }

    protected function checkLinksForSejourReserve() {
        
    }

}
