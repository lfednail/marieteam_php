# MarieTeam.php

Marieteam Web App est une application web conçue pourLa fonctionnalité principale de l'application est de permettre aux utilisateurs de visualiser les horaires des traversées maritimes entre différents ports, de sélectionner une traversée, et de procéder à la réservation de billets pour des passagers et des véhicules. L'application doit également fournir des informations détaillées sur les bateaux, y compris leurs caractéristiques et équipements, afin d'améliorer l'expérience utilisateur lors de la réservation.

### [AP24-25-2Slam (2).pdf](https://github.com/user-attachments/files/18053671/AP24-25-2Slam.2.pdf)

## Technologies utilisées



- **Backend** : [PHP]
- **Base de données** : [MySQL]
- **CSS Framework** : [Tailwind CSS]


## Diagramme de Cas d'Utilisation UML
┌─────────────────────────────────────────────────────────────────────────────┐
│                        SYSTÈME MARIETEAM                                     │
├─────────────────────────────────────────────────────────────────────────────┤
│                                                                             │
│   ┌─────────────────────── APPLICATION WEB ───────────────────────┐        │
│   │                                                                │        │
│   │  ┌──────────────┐    ┌──────────────┐    ┌──────────────┐    │        │
│   │  │ Consulter    │    │ Consulter    │    │ Consulter    │    │        │
│   │  │ liaisons     │    │ tarifs       │    │ traversées   │    │        │
│   │  └──────┬───────┘    └──────┬───────┘    └──────┬───────┘    │        │
│ 👤│         │                   │                   │            │        │
│Client       │    ┌──────────────┴───────────────────┘            │        │
│   │         │    │                                               │        │
│   │  ┌──────┴────┴──┐    ┌──────────────┐    ┌──────────────┐    │        │
│   │  │ S'authentifier│───▶│  Réserver    │───▶│   Payer      │◀──┼──💳    │
│   │  │    (MFA)      │    │  traversée   │    │   en ligne   │   │ Système│
│   │  └───────────────┘    └──────────────┘    └──────────────┘   │ Paiement
│   │                                                               │        │
│   │  ┌──────────────┐    ┌──────────────┐    ┌──────────────┐    │        │
│   │  │ Gérer        │    │ Gérer        │    │ Consulter    │    │        │
│ 👤│  │ liaisons     │    │ traversées   │    │ statistiques │    │        │
│Gest.│ └──────────────┘    └──────────────┘    └──────────────┘    │        │
│   │                                                               │        │
│   └───────────────────────────────────────────────────────────────┘        │
│                                                                             │
│   ┌─────────────────── APPLICATION MOBILE ────────────────────┐            │
│   │                                                            │            │
│   │  ┌──────────────┐    ┌──────────────┐    ┌──────────────┐ │            │
│ 👤│  │ Saisir état  │    │ Saisir       │    │ Synchroniser │ │            │
│Capit.│ │ de la mer    │    │ retard       │    │ données      │◀┼──🖥️      │
│   │  └──────────────┘    └──────────────┘    └──────────────┘ │  Serveur  │
│   │                                                            │            │
│   └────────────────────────────────────────────────────────────┘            │
│                                                                             │
│   ┌─────────────────── CLIENT LOURD (PDF) ────────────────────┐            │
│   │                                                            │            │
│   │  ┌──────────────┐    ┌──────────────┐                     │            │
│ 👤│  │ Sélectionner │    │ Générer      │                     │            │
│Gest.│ │ bateau       │───▶│ brochure PDF │                     │            │
│   │  └──────────────┘    └──────────────┘                     │            │
│   │                                                            │            │
│   └────────────────────────────────────────────────────────────┘            │
│                                                                             │
└─────────────────────────────────────────────────────────────────────────────┘


## Auteurs  
- **Fednail LECLERCQ**    
- **Etan MACRET**
- **Nathan VALLES** 
