<?php

/* BenskiCatalogueBundle:OptionChoixMultiple:new.html.twig */
class __TwigTemplate_c7957d240d17993f42a0a589677526fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenskiCatalogueBundle:OptionChoixMultiple:layout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BenskiCatalogueBundle:OptionChoixMultiple:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>OptionChoixMultiple creation</h1>

    ";
        // line 6
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("optionchoixmultiple");
        echo "\">
            Back to the list
        </a>
    </li>
</ul>
";
    }

    // line 18
    public function block_javascripts($context, array $blocks = array())
    {
        // line 19
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    \$(document).ready(function() {
        var container = \$('div#benski_cataloguebundle_optionchoixmultiple_choix');
        var lienAjout = \$('<a href=\"#\" id=\"ajout_choix\" class=\"btn\">Ajouter un choix</a><br>');
        container.append(lienAjout);
        lienAjout.click(function(e) {
            ajouterChoix(container);
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
        // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
        var index = container.find(':input').length;
        // On ajoute un premier champ directement s'il n'en existe pas déjà un (cas d'un nouvel article par exemple).
        if (index == 0) {
            ajouterChoix(container);
        } else {
            // Pour chaque catégorie déjà existante, on ajoute un lien de suppression
            container.children('div').each(function() {
                ajouterLienSuppression(\$(this));
            });
        }

        // La fonction qui ajoute un formulaire Categorie
        function ajouterChoix(container) {
            // Dans le contenu de l'attribut « data-prototype », on remplace :
            // - le texte \"__name__label__\" qu'il contient par le label du champ
            // - le texte \"__name__\" qu'il contient par le numéro du champ
            var prototype = \$(container.attr('data-prototype').replace(/__name__label__/g, 'Catégorie n°' + (index + 1))
                    .replace(/__name__/g, index));
            // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
            ajouterLienSuppression(prototype);
            // On ajoute le prototype modifié à la fin de la balise <div>
            container.append(prototype);
            // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
            index++;
        }

        // La fonction qui ajoute un lien de suppression d'une catégorie
        function ajouterLienSuppression(prototype) {
            // Création du lien
            lienSuppression = \$('<a href=\"#\" class=\"btn btn-danger\">Supprimer</a><br><br>');
            // Ajout du lien
            prototype.append(lienSuppression);
            // Ajout du listener sur le clic du lien
            lienSuppression.click(function(e) {
                prototype.remove();
                e.preventDefault(); // évite qu'un # apparaisse dans l'URL
                return false;
            });
        }
    });
    </script>
  ";
    }

    public function getTemplateName()
    {
        return "BenskiCatalogueBundle:OptionChoixMultiple:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 62,  97 => 34,  84 => 35,  110 => 41,  153 => 74,  146 => 70,  113 => 53,  129 => 52,  65 => 26,  104 => 38,  270 => 126,  265 => 124,  261 => 112,  251 => 105,  245 => 97,  242 => 96,  233 => 105,  226 => 100,  218 => 92,  216 => 91,  213 => 90,  210 => 89,  205 => 113,  202 => 111,  200 => 89,  197 => 88,  190 => 69,  180 => 50,  148 => 16,  134 => 124,  77 => 29,  58 => 19,  53 => 18,  118 => 49,  100 => 37,  81 => 34,  34 => 4,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 125,  264 => 84,  258 => 111,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 68,  132 => 51,  128 => 49,  107 => 36,  61 => 17,  273 => 127,  269 => 94,  254 => 106,  243 => 88,  240 => 86,  238 => 85,  235 => 107,  230 => 82,  227 => 81,  224 => 96,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 69,  135 => 53,  119 => 48,  102 => 46,  71 => 26,  67 => 25,  63 => 24,  59 => 25,  38 => 9,  94 => 34,  89 => 32,  85 => 31,  75 => 27,  68 => 28,  56 => 19,  87 => 30,  21 => 2,  26 => 6,  93 => 33,  88 => 38,  78 => 34,  46 => 14,  27 => 4,  44 => 9,  31 => 4,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 48,  166 => 71,  163 => 62,  158 => 19,  156 => 66,  151 => 17,  142 => 14,  138 => 54,  136 => 70,  121 => 55,  117 => 54,  105 => 42,  91 => 37,  62 => 21,  49 => 14,  24 => 4,  25 => 3,  19 => 1,  79 => 28,  72 => 27,  69 => 27,  47 => 9,  40 => 10,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 59,  123 => 51,  120 => 58,  115 => 43,  111 => 37,  108 => 79,  101 => 43,  98 => 49,  96 => 68,  83 => 29,  74 => 30,  66 => 15,  55 => 21,  52 => 23,  50 => 21,  43 => 10,  41 => 8,  35 => 4,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 68,  182 => 66,  176 => 49,  173 => 65,  168 => 47,  164 => 59,  162 => 20,  154 => 18,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 47,  116 => 41,  112 => 43,  109 => 52,  106 => 54,  103 => 77,  99 => 39,  95 => 42,  92 => 21,  86 => 28,  82 => 35,  80 => 19,  73 => 23,  64 => 18,  60 => 22,  57 => 23,  54 => 22,  51 => 20,  48 => 18,  45 => 8,  42 => 7,  39 => 10,  36 => 6,  33 => 6,  30 => 5,);
    }
}
