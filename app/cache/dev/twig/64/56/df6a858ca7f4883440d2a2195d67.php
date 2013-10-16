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
            'menuFactory' => array($this, 'block_menuFactory'),
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
                                <ul class=\"nav\">
                                    <li class=\"dropdown\">
                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">

                                            <i class=\"icon-calendar\"></i> Catalogue<b class=\"caret\"></b>
                                        </a>
                                        <ul class=\"dropdown-menu\">
                                            ";
        // line 47
        $this->displayBlock('menuFactory', $context, $blocks);
        // line 53
        echo "                                        </ul>
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
        // line 68
        $this->displayBlock('header', $context, $blocks);
        // line 73
        echo "                            </div>
                            <div class=\"span4\">       

                    ";
        // line 77
        echo "                                Connecté en tant que ";
        echo " - <a href=\"";
        echo "\">Déconnexion</a>
";
        // line 79
        echo "                                <a href=\"";
        echo "\">Connexion</a>
";
        // line 81
        echo "                            </div>

                        </div>
                    </div>
                </div>
                <div class=\"container-fluid\" id=\"mainContainer\">
                    <div class=\"row-fluid\">
                    ";
        // line 88
        $this->displayBlock('container', $context, $blocks);
        // line 115
        echo "                            </div>

                            <hr>

                            <footer>
                                <p>Benski &AMP; Benjamin Ellis © 2013 and beyond.</p>
                            </footer>
                        </div>

  ";
        // line 124
        $this->displayBlock('javascripts', $context, $blocks);
        // line 129
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

    // line 47
    public function block_menuFactory($context, array $blocks = array())
    {
        // line 48
        echo "                                            <li class=\"\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("destination");
        echo "\"><i class=\"icon-map-marker\"></i> Destination</a></li>
                                            <li class=\"\"><a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("sejour");
        echo "\"><i class=\"icon-calendar\"></i> Séjour</a></li>
                                            <li class=\"\"><a href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("appartement");
        echo "\"><i class=\"icon-home\"></i> Appartement</a></li>
                                            <li class=\"\"><a href=\"\"><i class=\"icon-list-alt\"></i> Lister</a></li>
                                            ";
    }

    // line 68
    public function block_header($context, array $blocks = array())
    {
        // line 69
        echo "
                                <h1>Benski</h1>
                                <p>Des séjours en altitude de qualités pour la famille et les amis.</p>
                ";
    }

    // line 88
    public function block_container($context, array $blocks = array())
    {
        // line 89
        $this->displayBlock('container_header', $context, $blocks);
        // line 111
        echo "          ";
        $this->displayBlock('body', $context, $blocks);
        // line 113
        echo "                                </div>
                        ";
    }

    // line 89
    public function block_container_header($context, array $blocks = array())
    {
        // line 90
        echo "                            <div id=\"content\" class=\"span12\">
                               ";
        // line 91
        $this->env->loadTemplate("::flashbag.html.twig")->display($context);
        // line 92
        echo "                                <div class=\"row-fluid\">
                                    <div class=\"span8\">
                                        <ul class=\"breadcrumb\">

                        ";
        // line 96
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 100
        echo "
                                        </ul>
                                    </div>
                                    <div class=\"span4\">
                                        <div class=\"pull-right\">
                                        ";
        // line 105
        $this->displayBlock('container_header_right', $context, $blocks);
        // line 107
        echo "                                            </div>
                                        </div>  
                                    </div>
                         ";
    }

    // line 96
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 97
        echo "                                            <li><a href=\"#\">Benski.be</a> <span class=\"divider\">/</span></li>
                                            <li><a href=\"#\">Administration</a> <span class=\"divider\">/</span></li>
                            ";
    }

    // line 105
    public function block_container_header_right($context, array $blocks = array())
    {
        // line 106
        echo "                                    ";
    }

    // line 111
    public function block_body($context, array $blocks = array())
    {
        // line 112
        echo "          ";
    }

    // line 124
    public function block_javascripts($context, array $blocks = array())
    {
        // line 125
        echo "    ";
        // line 126
        echo "                        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
                        <script type=\"text/javascript\" src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  270 => 126,  265 => 124,  261 => 112,  251 => 105,  245 => 97,  242 => 96,  233 => 105,  226 => 100,  218 => 92,  216 => 91,  213 => 90,  210 => 89,  205 => 113,  202 => 111,  200 => 89,  197 => 88,  190 => 69,  180 => 50,  148 => 16,  134 => 124,  77 => 47,  58 => 16,  53 => 19,  118 => 49,  100 => 38,  81 => 31,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 125,  264 => 84,  258 => 111,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 49,  107 => 36,  61 => 17,  273 => 127,  269 => 94,  254 => 106,  243 => 88,  240 => 86,  238 => 85,  235 => 107,  230 => 82,  227 => 81,  224 => 96,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 19,  67 => 19,  63 => 15,  59 => 14,  38 => 6,  94 => 28,  89 => 33,  85 => 32,  75 => 30,  68 => 28,  56 => 9,  87 => 25,  21 => 2,  26 => 6,  93 => 34,  88 => 6,  78 => 21,  46 => 13,  27 => 4,  44 => 14,  31 => 3,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 48,  166 => 71,  163 => 62,  158 => 19,  156 => 66,  151 => 17,  142 => 14,  138 => 54,  136 => 129,  121 => 88,  117 => 44,  105 => 40,  91 => 27,  62 => 23,  49 => 16,  24 => 4,  25 => 3,  19 => 1,  79 => 53,  72 => 29,  69 => 25,  47 => 9,  40 => 10,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 56,  123 => 115,  120 => 40,  115 => 43,  111 => 37,  108 => 79,  101 => 32,  98 => 73,  96 => 68,  83 => 25,  74 => 14,  66 => 15,  55 => 15,  52 => 14,  50 => 16,  43 => 11,  41 => 7,  35 => 4,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 68,  182 => 66,  176 => 49,  173 => 65,  168 => 47,  164 => 59,  162 => 20,  154 => 18,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 81,  109 => 34,  106 => 36,  103 => 77,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 22,  80 => 19,  73 => 23,  64 => 18,  60 => 6,  57 => 29,  54 => 10,  51 => 22,  48 => 13,  45 => 8,  42 => 7,  39 => 7,  36 => 5,  33 => 5,  30 => 6,);
    }
}
