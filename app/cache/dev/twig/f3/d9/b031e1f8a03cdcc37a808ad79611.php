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

                                            <i class=\"icon-calendar\">
                                            </i> Catalogue 
                                            <b class=\"caret\"></b>
                                        </a>
                                        <ul class=\"dropdown-menu\">
                                            <li class=\"\"><a href=\"\"><i class=\"icon-list-alt\"></i> Lister</a></li>
                                            <li class=\"\"><a href=\"\"><i class=\"icon-list-alt\"></i> Lister</a></li>
                                            <li class=\"\"><a href=\"\"><i class=\"icon-list-alt\"></i> Lister</a></li>
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
        // line 119
        echo "                            </div>

                            <hr>

                            <footer>
                                <p>Natagora &AMP; Benjamin Ellis © 2013 and beyond.</p>
                            </footer>
                        </div>

  ";
        // line 128
        $this->displayBlock('javascripts', $context, $blocks);
        // line 133
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
        // line 115
        echo "          ";
        $this->displayBlock('body', $context, $blocks);
        // line 117
        echo "                                </div>
                        ";
    }

    // line 91
    public function block_container_header($context, array $blocks = array())
    {
        // line 92
        echo "                            <div id=\"content\" class=\"span12\">
                                <div class=\"row-fluid\">
                                    <div class=\"span8\">
                                        <ul class=\"breadcrumb\">

                        ";
        // line 97
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 101
        echo "
                                        </ul>
                                    </div>
                                    <div class=\"span4\">
                                        <div class=\"pull-right\">
                                        ";
        // line 106
        $this->displayBlock('container_header_right', $context, $blocks);
        // line 108
        echo "                                            </div>
                                        </div>  
                                    </div>



                                        ";
    }

    // line 97
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 98
        echo "                                            <li><a href=\"#\">Benski.be</a> <span class=\"divider\">/</span></li>
                                            <li><a href=\"#\">Administration</a> <span class=\"divider\">/</span></li>
                            ";
    }

    // line 106
    public function block_container_header_right($context, array $blocks = array())
    {
        // line 107
        echo "                                    ";
    }

    // line 115
    public function block_body($context, array $blocks = array())
    {
        // line 116
        echo "          ";
    }

    // line 128
    public function block_javascripts($context, array $blocks = array())
    {
        // line 129
        echo "    ";
        // line 130
        echo "                        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
                        <script type=\"text/javascript\" src=\"";
        // line 131
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
        return array (  257 => 131,  254 => 130,  252 => 129,  249 => 128,  245 => 116,  242 => 115,  238 => 107,  235 => 106,  229 => 98,  226 => 97,  216 => 108,  214 => 106,  207 => 101,  205 => 97,  198 => 92,  195 => 91,  190 => 117,  187 => 115,  185 => 91,  182 => 90,  175 => 71,  172 => 70,  166 => 20,  162 => 19,  158 => 18,  155 => 17,  152 => 16,  146 => 14,  140 => 133,  138 => 128,  127 => 119,  125 => 90,  116 => 83,  112 => 81,  107 => 79,  102 => 75,  100 => 70,  50 => 22,  48 => 16,  43 => 14,  32 => 5,  28 => 2,);
    }
}
