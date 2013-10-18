<?php

/* ::layout.html.twig */
class __TwigTemplate_6456df6a858ca7f4883440d2a2195d67 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'header' => array($this, 'block_header'),
            'container' => array($this, 'block_container'),
            'container_header' => array($this, 'block_container_header'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'container_header_right' => array($this, 'block_container_header_right'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "

";
        // line 5
        echo "


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

        <title>";
        // line 14
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 16
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 22
        echo "    </head>

    <body>

       ";
        // line 29
        echo "        <div class=\"navbar navbar-static-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </a>
                    <div class=\"nav-collapse\">
                        <ul class=\"nav\">
                                <li class=\"\"><a href=\"#\"><i class=\"icon-home\"></i> Accueil</a></li>
                                <li class=\"\"><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("news");
        echo "\"><i class=\"icon-comment\"></i> News</a></li>
                                <ul class=\"nav\">
                                    <li class=\"dropdown\">
                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

                                            <i class=\"icon-calendar\"></i> Catalogue<b class=\"caret\"></b>
                                        </a>
                                        <ul class=\"dropdown-menu\">
                                            
                                            <li class=\"\"><a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("destination");
        echo "\"><i class=\"icon-map-marker\"></i> Destination</a></li>
                                            <li class=\"\"><a href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("sejour");
        echo "\"><i class=\"icon-calendar\"></i> Séjour</a></li>
                                            <li class=\"\"><a href=\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath("appartement");
        echo "\"><i class=\"icon-home\"></i> Appartement</a></li>
                                            <li class=\"\"><a href=\"\"><i class=\"icon-list-alt\"></i> Lister</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                                
                           </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            
            
            
            <div id=\"header\" class=\"\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"span8\">
";
        // line 70
        $this->displayBlock('header', $context, $blocks);
        // line 75
        echo "                            </div>
                            <div class=\"span4\">       

                    ";
        // line 79
        echo "                                Connecté en tant que ";
        echo " - <a href=\"";
        echo "\">Déconnexion</a>
";
        // line 81
        echo "                                <a href=\"";
        echo "\">Connexion</a>
";
        // line 83
        echo "                            </div>

                        </div>
                    </div>
                </div>
                <div class=\"container-fluid\" id=\"mainContainer\">
                    <div class=\"row-fluid\">
                    ";
        // line 90
        $this->displayBlock('container', $context, $blocks);
        // line 117
        echo "                            </div>

                            <hr>

                            <footer>
                                <p>Benski &AMP; Benjamin Ellis © 2013 and beyond.</p>
                            </footer>
                        </div>

  ";
        // line 126
        $this->displayBlock('javascripts', $context, $blocks);
        // line 131
        echo "
                    </body>
                </html>";
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        echo "Benski";
    }

    // line 16
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 17
        echo "
        <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/supportkot.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    ";
    }

    // line 70
    public function block_header($context, array $blocks = array())
    {
        // line 71
        echo "
                                <h1>Benski</h1>
                                <p>Des séjours en altitude de qualités pour la famille et les amis.</p>
                ";
    }

    // line 90
    public function block_container($context, array $blocks = array())
    {
        // line 91
        $this->displayBlock('container_header', $context, $blocks);
        // line 113
        echo "          ";
        $this->displayBlock('body', $context, $blocks);
        // line 115
        echo "                                </div>
                        ";
    }

    // line 91
    public function block_container_header($context, array $blocks = array())
    {
        // line 92
        echo "                            <div id=\"content\" class=\"span12\">
                               ";
        // line 93
        $this->env->loadTemplate("::flashbag.html.twig")->display($context);
        // line 94
        echo "                                <div class=\"row-fluid\">
                                    <div class=\"span8\">
                                        <ul class=\"breadcrumb\">

                        ";
        // line 98
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 102
        echo "
                                        </ul>
                                    </div>
                                    <div class=\"span4\">
                                        <div class=\"pull-right\">
                                        ";
        // line 107
        $this->displayBlock('container_header_right', $context, $blocks);
        // line 109
        echo "                                            </div>
                                        </div>  
                                    </div>
                         ";
    }

    // line 98
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 99
        echo "                                            <li><a href=\"#\">Benski.be</a> <span class=\"divider\">/</span></li>
                                            <li><a href=\"#\">Administration</a> <span class=\"divider\">/</span></li>
                            ";
    }

    // line 107
    public function block_container_header_right($context, array $blocks = array())
    {
        // line 108
        echo "                                    ";
    }

    // line 113
    public function block_body($context, array $blocks = array())
    {
        // line 114
        echo "          ";
    }

    // line 126
    public function block_javascripts($context, array $blocks = array())
    {
        // line 127
        echo "    ";
        // line 128
        echo "                        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
                        <script type=\"text/javascript\" src=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  269 => 129,  266 => 128,  264 => 127,  261 => 126,  257 => 114,  254 => 113,  250 => 108,  247 => 107,  241 => 99,  238 => 98,  231 => 109,  229 => 107,  222 => 102,  220 => 98,  214 => 94,  212 => 93,  209 => 92,  206 => 91,  201 => 115,  198 => 113,  196 => 91,  193 => 90,  186 => 71,  183 => 70,  177 => 20,  173 => 19,  169 => 18,  157 => 14,  151 => 131,  149 => 126,  138 => 117,  136 => 90,  127 => 83,  118 => 79,  113 => 75,  89 => 51,  85 => 50,  81 => 49,  69 => 40,  56 => 29,  48 => 16,  28 => 2,  61 => 17,  58 => 16,  46 => 13,  33 => 7,  30 => 6,  73 => 23,  67 => 19,  64 => 18,  57 => 14,  45 => 8,  42 => 7,  166 => 17,  163 => 16,  153 => 77,  146 => 72,  134 => 66,  129 => 64,  123 => 81,  119 => 60,  115 => 59,  111 => 70,  105 => 57,  99 => 56,  96 => 55,  92 => 54,  68 => 32,  66 => 29,  63 => 22,  53 => 19,  50 => 22,  43 => 14,  40 => 10,  35 => 4,  32 => 5,);
    }
}
