<?php

/* BenskiCatalogueBundle:Sejour:show.html.twig */
class __TwigTemplate_791b6e97e74904e70307490a899b6654 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenskiCatalogueBundle:Sejour:layout.html.twig");

        $this->blocks = array(
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'container_header_right' => array($this, 'block_container_header_right'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BenskiCatalogueBundle:Sejour:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 5
        $this->displayParentBlock("breadcrumb", $context, $blocks);
        echo "
<li class=\"active\">Show</li>
";
    }

    // line 10
    public function block_header($context, array $blocks = array())
    {
        // line 11
        echo "<h1>Sejour</h1>
";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "<table class=\"table table-striped\">
   <tbody>
      <tr>
         <th>Id</th>
         <td>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
        echo "</td>
      </tr>
      <tr>
         <th>Nom</th>
         <td>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nom"), "html", null, true);
        echo "</td>
      </tr>
      <tr>
         <th>Datedebut</th>
         <td>";
        // line 29
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dateDebut"), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
      </tr>
      <tr>
         <th>Datefin</th>
         <td>";
        // line 33
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "dateFin"), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
      </tr>
   </tbody>
</table>

<div class=\"pull-right\">
   <a class=\"btn btn-primary\" href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sejour_appartement_bind", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
      <i class=\"icon-plus icon-white\"></i>
      Ajouter un appartement
   </a></div>
<h2>Appartement disponibles</h2>

<table class=\"table table-condensed\">
   <thead>
   <th>Destination</th>
   <th>Appartement</th>
   <th>Qualite</th>
   <th>Nombre lits</th>

   <th><span class=\"text-info\">Reservation / </span>Stock</th>
   <th>Nombre personnes</th>
   <th>Prix</th>
   <th>Actions</th>
</thead>
<tbody>
   ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "appartements"));
        foreach ($context['_seq'] as $context["_key"] => $context["appart"]) {
            // line 59
            echo "      ";
            $context["rowspan"] = $this->getAttribute($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "appartement"), "nombreLits");
            // line 60
            echo "      <tr>
         <td rowspan=\"";
            // line 61
            echo twig_escape_filter($this->env, (isset($context["rowspan"]) ? $context["rowspan"] : $this->getContext($context, "rowspan")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "appartement"), "destination"), "html", null, true);
            echo "</td>
         <td rowspan=\"";
            // line 62
            echo twig_escape_filter($this->env, (isset($context["rowspan"]) ? $context["rowspan"] : $this->getContext($context, "rowspan")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "appartement"), "nom"), "html", null, true);
            echo "</td>
         <td rowspan=\"";
            // line 63
            echo twig_escape_filter($this->env, (isset($context["rowspan"]) ? $context["rowspan"] : $this->getContext($context, "rowspan")), "html", null, true);
            echo "\">
         ";
            // line 64
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "appartement"), "qualite")));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 65
                echo "               <i class=\"icon-star\"></i>
               ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "         </td>
         <td rowspan=\"";
            // line 68
            echo twig_escape_filter($this->env, (isset($context["rowspan"]) ? $context["rowspan"] : $this->getContext($context, "rowspan")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "appartement"), "nombreLits"), "html", null, true);
            echo "</td>

         <td rowspan=\"";
            // line 70
            echo twig_escape_filter($this->env, (isset($context["rowspan"]) ? $context["rowspan"] : $this->getContext($context, "rowspan")), "html", null, true);
            echo "\">
            <span class=\"text-info\">133 / </span>";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "stock"), "html", null, true);
            echo "
            <span class=\"badge badge-success commande-reserve\" >101</span>
            <span class=\"badge badge-info commande-commande\" >7</span>
            <span class=\"badge badge-warning commande-attente\" >23</span>
            <span class=\"badge badge-important commande-annule\" >2</span>
         </td>

         <td>1 <i class=\"icon-user\"></i></td>
         <td>";
            // line 79
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "prixParPersonne", array(0 => 1), "method") / twig_number_format_filter($this->env, 100)), "html", null, true);
            echo " €</td>
         <td rowspan=\"";
            // line 80
            echo twig_escape_filter($this->env, (isset($context["rowspan"]) ? $context["rowspan"] : $this->getContext($context, "rowspan")), "html", null, true);
            echo "\">
            <a class=\"btn\" href=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sejour_appartement_edit", array("appartement" => $this->getAttribute($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "appartement"), "id"), "sejour" => $this->getAttribute($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "sejour"), "id"))), "html", null, true);
            echo "\">
               Edit</a>
         </td>
      </tr>
      ";
            // line 85
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(2, (isset($context["rowspan"]) ? $context["rowspan"] : $this->getContext($context, "rowspan"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 86
                echo "      <tr>
         <td>";
                // line 87
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                echo " <i class=\"icon-user\"></i></td>
         <td>";
                // line 88
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["appart"]) ? $context["appart"] : $this->getContext($context, "appart")), "prixParPersonne", array(0 => (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "method") / twig_number_format_filter($this->env, 100)), "html", null, true);
                echo " €</td>
      </tr>
   ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            echo "   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['appart'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "
   </tbody>

</table>
";
    }

    // line 99
    public function block_container_header_right($context, array $blocks = array())
    {
        // line 100
        echo "<div class=\"btn-group\">
   <a class=\"btn \" href=\"";
        // line 101
        echo $this->env->getExtension('routing')->getPath("sejour");
        echo "\">
      <i class=\"icon-chevron-left\"></i> 
      Back to the list
   </a>
   <a class=\"btn \" id=\"test\" href=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sejour_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
      <i class=\"icon-pencil\"></i> Edit</a>
</a>

</div>
";
    }

    // line 113
    public function block_javascripts($context, array $blocks = array())
    {
        // line 114
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script  >
\$(function(){

   \$(\".commande-reserve\").tooltip({placement:'bottom', title:'reserve'}  );
   \$(\".commande-annule\").tooltip({placement:'bottom', title:'annule'}  );
   \$(\".commande-attente\").tooltip({placement:'bottom', title:'en attente'}  );
   \$(\".commande-commande\").tooltip({placement:'bottom', title:'commade'}  );

});
   </script>
";
    }

    public function getTemplateName()
    {
        return "BenskiCatalogueBundle:Sejour:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 114,  228 => 101,  225 => 100,  222 => 99,  195 => 87,  192 => 86,  188 => 85,  181 => 81,  137 => 64,  124 => 51,  160 => 78,  150 => 74,  114 => 44,  127 => 62,  97 => 34,  84 => 35,  110 => 41,  153 => 74,  146 => 73,  113 => 53,  129 => 52,  65 => 23,  104 => 38,  270 => 126,  265 => 124,  261 => 112,  251 => 105,  245 => 113,  242 => 96,  233 => 105,  226 => 100,  218 => 92,  216 => 91,  213 => 90,  210 => 89,  205 => 113,  202 => 111,  200 => 89,  197 => 88,  190 => 69,  180 => 50,  148 => 67,  134 => 124,  77 => 29,  58 => 20,  53 => 17,  118 => 60,  100 => 37,  81 => 34,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 125,  264 => 84,  258 => 111,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 92,  177 => 80,  169 => 60,  140 => 68,  132 => 51,  128 => 49,  107 => 51,  61 => 17,  273 => 127,  269 => 94,  254 => 106,  243 => 88,  240 => 86,  238 => 85,  235 => 105,  230 => 82,  227 => 81,  224 => 96,  221 => 77,  219 => 76,  217 => 75,  208 => 91,  204 => 72,  179 => 69,  159 => 61,  143 => 69,  135 => 70,  119 => 48,  102 => 46,  71 => 26,  67 => 19,  63 => 24,  59 => 21,  38 => 8,  94 => 34,  89 => 39,  85 => 36,  75 => 27,  68 => 28,  56 => 19,  87 => 30,  21 => 2,  26 => 6,  93 => 33,  88 => 38,  78 => 34,  46 => 14,  27 => 4,  44 => 9,  31 => 4,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 48,  166 => 71,  163 => 62,  158 => 70,  156 => 66,  151 => 68,  142 => 72,  138 => 71,  136 => 57,  121 => 61,  117 => 54,  105 => 42,  91 => 37,  62 => 22,  49 => 15,  24 => 4,  25 => 3,  19 => 1,  79 => 28,  72 => 27,  69 => 27,  47 => 9,  40 => 10,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 69,  123 => 51,  120 => 58,  115 => 59,  111 => 58,  108 => 79,  101 => 39,  98 => 49,  96 => 68,  83 => 29,  74 => 30,  66 => 25,  55 => 21,  52 => 16,  50 => 15,  43 => 10,  41 => 9,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 88,  193 => 73,  189 => 71,  187 => 68,  182 => 66,  176 => 49,  173 => 79,  168 => 47,  164 => 59,  162 => 71,  154 => 18,  149 => 51,  147 => 58,  144 => 49,  141 => 65,  133 => 63,  130 => 41,  125 => 44,  122 => 47,  116 => 41,  112 => 43,  109 => 42,  106 => 54,  103 => 77,  99 => 46,  95 => 38,  92 => 21,  86 => 28,  82 => 35,  80 => 33,  73 => 29,  64 => 18,  60 => 22,  57 => 14,  54 => 22,  51 => 16,  48 => 14,  45 => 11,  42 => 10,  39 => 9,  36 => 6,  33 => 5,  30 => 4,);
    }
}
