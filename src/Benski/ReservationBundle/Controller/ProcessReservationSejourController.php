<?php

namespace Benski\ReservationBundle\Controller;

use Benski\ReservationBundle\Entity\ReservationImpl;
use JMS\DiExtraBundle\Annotation\Inject;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Benski\ReservationBundle\Entity\AppartementReserve;
use Benski\ReservationBundle\Entity\SejourReserve;
use Benski\CatalogueBundle\Entity\Sejour;
use Benski\CatalogueBundle\Entity\Destination;
use \Benski\ReservationBundle\Form\ProcessReservationSejourOptionGroupe;
use \Benski\ReservationBundle\Entity\Option\OptionACocherReserve;
use Benski\ReservationBundle\Entity\Option\OptionChoixMultipleReserve;
use Benski\ReservationBundle\Entity\ReservationSejour;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Benski\ReservationBundle\Entity\Paiement;
use Symfony\Component\Translation\Translator;

class ProcessReservationSejourController extends Controller
{

    /**
     * @Inject("translator")
     * @var Translator
     */
    private $translator;

    private $errors;

    public function __construct()
    {
        $this->errors = array();
    }

    public function isThereErrors()
    {
        if (empty($this->errors))
            return false;
        return true;
    }

    public function addError($title, $content)
    {
        $error = array();
        $error['type'] = 'danger';
        $error['title'] = $title;
        $error['content'] = $content;
        $entry = array($title, $content);
        $this->errors[] = $entry;
        $this->get('session')->getFlashBag()->add('error', $error);
    }

    /**
     * Début de la reservation proprement dites
     * Première étape: on choisi les options de groupes
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",   class="BenskiCatalogueBundle:Destination")
     */
    public function formOptionsGroupeAction(Sejour $sejour, Destination $destination)
    {
        $panier = PanierController::getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $entity = $reservationSejour->getSejourReserve();

        /*
          $form = $this->createForm(new ProcessReservationSejourOptionGroupe(), $entity, array(
          'action' => $this->generateUrl('destination'),
          'method' => 'POST',
          ));

          $form->add('submit', 'submit', array('label' => 'Create'));
         * 
         */

        return $this->render('BenskiReservationBundle:ProcessReservation\Sejour:form_options_groupes.html.twig', array(
            'entity' => $entity,
            'sejour' => $sejour,
            'destination' => $destination,
        ));
    }

    /*
     * On traite le formulaire de la première étape
     * Si tout convient, on passe à la suite.
     * Si problème, on affiche l'ancien formulaire en affichant les
     * problèmes relevés.
     */

    /**
     * Début de la reservation proprement dites
     * Première étape: on choisi les options de groupes
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",   class="BenskiCatalogueBundle:Destination")
     */
    public function processFormOptionsGroupeAction(Sejour $sejour, Destination $destination)
    {
        $panier = PanierController::getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $entity = $reservationSejour->getSejourReserve();

        $appartementsReserves = $entity->getAppartementsReserves();
        foreach ($appartementsReserves as $appartementReserve) {
            /* @var $appartementReserve AppartementReserve */
            $optionsReserves = $appartementReserve->getOptionsReserves();
            foreach ($optionsReserves as $optionReserve) {
                $this->processFormForOptionGroupe($optionReserve);
            }
        }
        if ($this->isThereErrors()) {
            return $this->redirect($this->generateUrl('benski_reservation_sejour_form_option_groupe', array(
                'sejour' => $sejour->getId(),
                'destination' => $destination->getId(),
            )));
        }
        return $this->redirect(
            $this->generateUrl('benski_reservation_sejour_form_option_individuelle', array(
                'destination' => $destination->getId(),
                'sejour' => $sejour->getId()
            )));
    }

    private function processFormForOptionGroupe($optionReserve)
    {
        $varName = 'option-' . $optionReserve->getOption()->getId();
        $varName .= '-' . $optionReserve->getAppartement()->getNumero();
        if ($optionReserve instanceof OptionACocherReserve)
            $this->processFormForOptionACocher($optionReserve, $varName);
        else if ($optionReserve instanceof OptionChoixMultipleReserve)
            $this->processFormForOptionChoixMultiple($optionReserve, $varName);
    }

    private function processFormForOptionACocher(OptionACocherReserve $optionReserve, $varName)
    {
        if (isset($_REQUEST[$varName])) {
            $optionReserve->setCoche(true);
        } else {
            $optionReserve->setCoche(false);
        }
    }

    private function processFormForOptionChoixMultiple(OptionChoixMultipleReserve $optionReserve, $varName)
    {
        if (!isset($_REQUEST[$varName])) {
            $this->addError('Formulaire incomplet!', 'Veuillez remplir le formulaire au complet, ceci compris les'
                . ' options à choix multiple');
            return;
        }
        $choixId = $_REQUEST[$varName];
        $listChoix = $optionReserve->getOption()->getChoix();
        foreach ($listChoix as $choix) {
            if ($choix->getId() == $choixId) {
                $optionReserve->setChoix($choix);
                return;
            }
        }
    }

    /*
     * 2ième étape de la réservation: on choisi les options individuelles
     */

    /**
     * Début de la reservation proprement dites
     * Première étape: on choisi les options de groupes
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",   class="BenskiCatalogueBundle:Destination")
     */
    public function formOptionsIndividuelleAction(Sejour $sejour, Destination $destination)
    {
        $panier = PanierController::getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $entity = $reservationSejour->getSejourReserve();


        return $this->render('BenskiReservationBundle:ProcessReservation\Sejour:form_options_individuelles.html.twig', array(
            'entity' => $entity,
            'sejour' => $sejour,
            'destination' => $destination,
        ));
    }

    /**
     * Début de la reservation proprement dites
     * Première étape: on choisi les options de groupes
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",   class="BenskiCatalogueBundle:Destination")
     */
    public function processFormOptionsIndividuelleAction(Sejour $sejour, Destination $destination)
    {
        $panier = PanierController::getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $entity = $reservationSejour->getSejourReserve();
        foreach ($entity->getAppartementsReserves() as $appartementReserve) {
            foreach ($appartementReserve->getParticipants() as $participant) {
                foreach ($participant->getOptionsReserves() as $optionReserve) {
                    $this->processFormForOptionIndividuelle($optionReserve);
                }
            }
        }
        if ($this->isThereErrors()) {
            return $this->redirect($this->generateUrl('benski_reservation_sejour_form_option_individuelle', array(
                'sejour' => $sejour->getId(),
                'destination' => $destination->getId(),
            )));
        }
        return $this->redirect(
            $this->generateUrl('benski_reservation_sejour_form_identification_participant', array(
                'destination' => $destination->getId(),
                'sejour' => $sejour->getId()
            )));
    }

    private function processFormForOptionIndividuelle($optionReserve)
    {
        $varName = 'option-' . $optionReserve->getOption()->getId();
        $varName .= '-' . $optionReserve->getParticipant()->getAppartementReserve()->getNumero();
        $varName .= '-' . $optionReserve->getParticipant()->getNumero();
        if ($optionReserve instanceof OptionACocherReserve)
            $this->processFormForOptionACocher($optionReserve, $varName);
        else if ($optionReserve instanceof OptionChoixMultipleReserve)
            $this->processFormForOptionChoixMultiple($optionReserve, $varName);
    }

    private function processFormForOptionACocherIndividuelle(OptionACocherReserve $optionReserve, $varName)
    {
        if (isset($_REQUEST[$varName])) {
            $optionReserve->setCoche(true);
        } else {
            $optionReserve->setCoche(false);
        }
    }

    private function processFormForOptionChoixMultipleIndividuelle(OptionChoixMultipleReserve $optionReserve, $varName)
    {
        $choixId = $_REQUEST[$varName];
        $listChoix = $optionReserve->getOption()->getChoix();
        foreach ($listChoix as $choix) {
            if ($choix->getId() == $choixId) {
                $optionReserve->setChoix($choix);
                return;
            }
        }
    }

    /**
     * Début de la reservation proprement dites
     * Première étape: on choisi les options de groupes
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",   class="BenskiCatalogueBundle:Destination")
     */
    public function identificationParticipantsAction(Sejour $sejour, Destination $destination)
    {
        $panier = PanierController::getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $entity = $reservationSejour->getSejourReserve();

        return $this->render('BenskiReservationBundle:ProcessReservation\Sejour:form_participants.html.twig', array(
            'entity' => $entity,
            'sejour' => $sejour,
            'destination' => $destination,
        ));
    }

    /**
     * Début de la reservation proprement dites
     * derniere étape dans le formulaire: on défini les participants
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",   class="BenskiCatalogueBundle:Destination")
     */
    public function processIdentificationParticipantsAction(Sejour $sejour, Destination $destination)
    {
        $panier = PanierController::getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $entity = $reservationSejour->getSejourReserve();

        foreach ($entity->getAppartementsReserves() as $appartementReserve) {
            foreach ($appartementReserve->getParticipants() as $participant) {
                $this->processFormForParticipant($participant);
            }
        }
        if ($this->isThereErrors()) {
            return $this->render('BenskiReservationBundle:ProcessReservation\Sejour:form_participants.html.twig', array(
                'entity' => $entity,
                'sejour' => $sejour,
                'destination' => $destination,
            ));
        } else {
            return $this->redirect(
                $this->generateUrl('benski_reservation_sejour_confirmation', array(
                    'destination' => $destination->getId(),
                    'sejour' => $sejour->getId()
                )));
        }
    }

    private function processFormForParticipant($participant)
    {
        /* @var $participant \Benski\ReservationBundle\Entity\Participant */
        $var = "participant-" . $participant->getAppartementReserve()->getNumero() . "-" . $participant->getNumero() . "-";
        $personne = $participant->getPersonne();
        $personne->setFirstName($this->getFormInput($var . "person-firstName"));
        $personne->setLastName($this->getFormInput($var . "person-lastName"));
        $personne->setEmail($this->getFormInput($var . "person-email-1", true));
        $address = $personne->getAddress();
        $address->setStreet($this->getFormInput($var . "person-address-street", true));
        $address->setNumber($this->getFormInput($var . "person-address-number", true));
        $address->setZipCode($this->getFormInput($var . "person-address-zipCode", true));
        $address->setCity($this->getFormInput($var . "person-address-City", true));
        $address->setCountry($this->getFormInput($var . "person-address-Country", true));
    }

    private function getFormInput($varName, $nullable = false)
    {
        if (isset($_REQUEST[$varName]) AND !empty($_REQUEST[$varName]))
            return $_REQUEST[$varName];
        else {
            if ($nullable == false) {
                $this->addError('Formulaire incomplet!', 'Veuillez remplir tout les noms, prénoms et adresse email.');
            }
        }
    }

    // ---------- CONFIRMATION

    /**
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",   class="BenskiCatalogueBundle:Destination")
     */
    public function confirmationAction(Sejour $sejour, Destination $destination)
    {
        $panier = PanierController::getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $entity = $reservationSejour->getSejourReserve();

        // ajout du formulaire accepeter condition générale
        $generalTermsForm = $this->createGeneralTermsFrom();

        return $this->render('BenskiReservationBundle:ProcessReservation\Sejour:confirmation.html.twig', array(
            'entity' => $entity,
            'sejour' => $sejour,
            'destination' => $destination,
            'form' => $generalTermsForm->createView()
        ));
    }

    /**
     * @return Form
     */
    private function createGeneralTermsFrom()
    {
        $builder = $this->createFormBuilder()
            ->add('generalTerms', 'checkbox', array(
                'required' => false
            ))
            ->add('submit', 'submit')
            ->setMethod('POST')
//            ->setAction('')
        ;

        $form = $builder->getForm();
        return $form;
    }

    // --------- ENREGISTREMENT

    /**
     * @ParamConverter("sejour",        class="BenskiCatalogueBundle:Sejour")
     * @ParamConverter("destination",   class="BenskiCatalogueBundle:Destination")
     */
    public function enregistrerReservationAction(Sejour $sejour, Destination $destination, Request $request)
    {

        $form = $this->createGeneralTermsFrom();
        $form->handleRequest($request);
        $errorTitle = $this->translator->trans("generalterm.title");
        $errorMessage = $this->translator->trans("generalterm.message");
        if(!$form->isValid()){
            $this->addError($errorTitle, $errorMessage);
            return $this->redirect($this->generateUrl('benski_reservation_sejour_confirmation', array(
                'sejour' => $sejour->getId(),
                'destination' => $destination->getId()
            )));
        }
        $generalTerms = $form->getData()['generalTerms'];

        if($generalTerms == false){
            $this->addError($errorTitle, $errorMessage);
            return $this->redirect($this->generateUrl('benski_reservation_sejour_confirmation', array(
                'sejour' => $sejour->getId(),
                'destination' => $destination->getId()
            )));
        }

        $panier = PanierController::getPanier();
        $reservationSejour = $panier->getReservationSejour($sejour, $destination);
        $sejourReserve = $reservationSejour->getSejourReserve();
        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();

        /** @var $reservationSejour ReservationSejour */
        $reservationSejour->setResponsable($user);
        $reservationSejour->confirmer();

        $paiement = $reservationSejour->getPaiements()[0];

        // je merge le séjour car je l'ai mis dans la session
        $this->mergeExistantEntitiesInReservationSejour($reservationSejour);
        // c'est bien la réservation qu'il faut enregistrer
        $em->persist($reservationSejour);

        $em->flush();
        //$panier->removeReservationSejour($reservationSejour);
        return $this->redirect(
            $this->generateUrl('benski_reservation_sejour_paiement', array(
                'reservation' => $reservationSejour->getId(),
            )));

        /*
          return $this->render('BenskiReservationBundle:ProcessReservation\Sejour:paiement.html.twig', array(
          'entity' => $reservationSejour,
          'sejour' => $sejour,
          'destination' => $destination,
          'acompte' => $paiement,
          ));
         * 
         */
    }

    /**
     * @ParamConverter("reservation", class="BenskiReservationBundle:ReservationImpl")
     * @Secure(roles="ROLE_USER")
     */
    public function afficherPaiementAction(ReservationImpl $reservation)
    {
        if($this->getUser() != $reservation->getResponsable()) throw new \Exception("You are not allow to do that.");

        return $this->render('BenskiReservationBundle:ProcessReservation\Sejour:paiement.html.twig', array(
            'entities' => $reservation->getPaiements(),
        ));
    }

    // -------------- MERGE
    // -------------- MERGE
    // -------------- MERGE
    // -------------- MERGE

    private function mergeExistantEntitiesInPaiement(Paiement $paiement)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->merge($paiement->getUser());
        $paiement->setUser($user);
    }

    private function mergeExistantEntitiesInReservationSejour(ReservationSejour $reservationSejour)
    {
        $paiements = $reservationSejour->getPaiements();
        foreach ($paiements as $paiement) {
            $this->mergeExistantEntitiesInPaiement($paiement);
        }
        $em = $this->getDoctrine()->getManager();
        $sejourReserve = $reservationSejour->getSejourReserve();
        $sejour = $em->merge($sejourReserve->getSejour());
        $sejourReserve->setSejour($sejour);
        $destination = $em->merge($sejourReserve->getDestination());
        $sejourReserve->setDestination($destination);
        foreach ($sejourReserve->getAppartementsReserves() as $appartementReserve) {
            /* @var $appartementReserve AppartementReserve */
            $this->mergeExistantEntitiesInAppartementReserve($appartementReserve);
        }
    }

    private function mergeExistantEntitiesInAppartementReserve($appartementReserve)
    {
        $em = $this->getDoctrine()->getManager();
        /* @var $appartementReserve AppartementReserve */
        $appartement = $em->merge($appartementReserve->getAppartement());
        $appartementReserve->setAppartement($appartement);

        $this->mergeExistantEntitiesInPackReserve($appartementReserve->getPackReserve());
        foreach ($appartementReserve->getOptionsReserves() as $optionReserve) {
            /* @var $optionReserve \Benski\ReservationBundle\Entity\Option\OptionReserve */
            $this->mergeExistantEntitiesInOptionReserve($optionReserve);
        }
        foreach ($appartementReserve->getParticipants() as $participant) {
            $this->mergeExistantEntitiesInParticipant($participant);
        }
    }

    // PARTICIPANT
    private function mergeExistantEntitiesInPackReserve($packReserve)
    {
        $em = $this->getDoctrine()->getManager();
        /* @var $packReserve \Benski\ReservationBundle\Entity\PackReserve */
        $pack = $em->merge($packReserve->getPack());
        $packReserve->setPack($pack);
    }

    // PARTICIPANT
    private function mergeExistantEntitiesInParticipant($participant)
    {
        /* @var $participant \Benski\ReservationBundle\Entity\Participant */
        foreach ($participant->getOptionsReserves() as $optionReserve) {
            $this->mergeExistantEntitiesInOptionReserve($optionReserve);
        }
    }

    private function mergeExistantEntitiesInOptionReserve($optionReserve)
    {
        /* @var $optionReserve \Benski\ReservationBundle\Entity\Option\OptionReserve */
        $em = $this->getDoctrine()->getManager();
        /* @var $optionReseve \Benski\ReservationBundle\Entity\Option\OptionReserve */

        $option = $em->merge($optionReserve->getOption());
        $optionReserve->setOption($option);
        if ($optionReserve instanceof OptionChoixMultipleReserve) {
            $this->mergeExistantEntitiesInOptionChoixMultipleReserve($optionReserve);
        }
    }

    private function mergeExistantEntitiesInOptionChoixMultipleReserve($optionReseve)
    {
        $em = $this->getDoctrine()->getManager();
        /* @var $optionReseve \Benski\ReservationBundle\Entity\Option\OptionChoixMultipleReserve */
        $choix = $em->merge($optionReseve->getChoix());
        $optionReseve->setChoix($choix);
    }

}
