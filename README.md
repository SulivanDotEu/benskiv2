Symfony Standard Edition
========================

Welcome to the Symfony Standard Edition - a fully-functional Symfony2
application that you can use as the skeleton for your new applications.

This document contains information on how to download, install, and start
using Symfony. For a more detailed explanation, see the [Installation][1]
chapter of the Symfony Documentation.

1) Installing the Standard Edition
----------------------------------


2) Hiérarchie des vues
----------------------

Dans un premier temps, concentrons nous sur les vues *publics*.
Depuis septembre 2014, un nouveau layout a été créé et celui-ci se trouve dans
**Benski/WebsiteBundle:Resource/views/public.html.twig**.

Prenons l'exemple de la page d'acceuil, soit *home*. On à cette hérarchie:
    * src\Benski\WebsiteBundle\Resources\views\Public\home.html.twig
    * src\Benski\WebsiteBundle\Resources\views\public_layout.html.twig
    * src\Benski\WebsiteBundle\Resources\views\public.html.twig

Pour mettre à jour tout les anciennes page qui sont sur le design précédent,
j'ai repris le layout en vigueur et l'ai fait étendre le layout :
**src\Benski\WebsiteBundle\Resources\views\public_layout.html.twig**


What's inside?
---------------

The Symfony Standard Edition is configured with the following defaults:

  * Twig is the only configured template engine;

  * Doctrine ORM/DBAL is configured;

  * Swiftmailer is configured;

  * Annotations for everything are enabled.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **AcmeDemoBundle** (in dev/test env) - A demo bundle with some example
    code

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  http://symfony.com/doc/2.3/book/installation.html
[2]:  http://getcomposer.org/
