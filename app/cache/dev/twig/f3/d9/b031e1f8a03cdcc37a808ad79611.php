<?php

/* ::layout.html.twig */
class __TwigTemplate_f3d9b031e1f8a03cdcc37a808ad79611 extends Twig_Template
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
        <div class=\"navbar navbar-static-top\">
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
                                            <li class=\"\"><a href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("destination");
        echo "\"><i class=\"icon-map-marker\"></i> Destination</a></li>
                                            <li class=\"\"><a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("sejour");
        echo "\"><i class=\"icon-calendar\"></i> Séjour</a></li>
                                            <li class=\"\"><a href=\"";
        // line 45
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
        // line 113
        echo "          ";
        $this->displayBlock('body', $context, $blocks);
        // line 115
        echo "                                </div>
                        ";
    }

    // line 89
    public function block_container_header($context, array $blocks = array())
    {
        // line 90
        echo "                            <div id=\"content\" class=\"span12\">
                                <div class=\"row-fluid\">
                                    <div class=\"span8\">
                                        <ul class=\"breadcrumb\">

                        ";
        // line 95
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 99
        echo "
                                        </ul>
                                    </div>
                                    <div class=\"span4\">
                                        <div class=\"pull-right\">
                                        ";
        // line 104
        $this->displayBlock('container_header_right', $context, $blocks);
        // line 106
        echo "                                            </div>
                                        </div>  
                                    </div>



                                        ";
    }

    // line 95
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 96
        echo "                                            <li><a href=\"#\">Benski.be</a> <span class=\"divider\">/</span></li>
                                            <li><a href=\"#\">Administration</a> <span class=\"divider\">/</span></li>
                            ";
    }

    // line 104
    public function block_container_header_right($context, array $blocks = array())
    {
        // line 105
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
        return array (  264 => 129,  261 => 128,  259 => 127,  256 => 126,  252 => 114,  249 => 113,  245 => 105,  242 => 104,  236 => 96,  233 => 95,  223 => 106,  221 => 104,  214 => 99,  212 => 95,  205 => 90,  202 => 89,  197 => 115,  194 => 113,  192 => 89,  189 => 88,  182 => 69,  179 => 68,  173 => 20,  169 => 19,  165 => 18,  162 => 17,  159 => 16,  153 => 14,  147 => 131,  145 => 126,  134 => 117,  132 => 88,  123 => 81,  119 => 79,  114 => 77,  109 => 73,  107 => 68,  81 => 45,  77 => 44,  73 => 43,  50 => 22,  48 => 16,  43 => 14,  32 => 5,  28 => 2,);
    }
}
