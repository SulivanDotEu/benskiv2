<?php

/* BenskiCatalogueBundle:Appartement:show.html.twig */
class __TwigTemplate_19c70b05632efef4dc43b80c69c9b548 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenskiCatalogueBundle:Appartement:layout.html.twig");

        $this->blocks = array(
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'container_header_right' => array($this, 'block_container_header_right'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BenskiCatalogueBundle:Appartement:layout.html.twig";
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

    // line 9
    public function block_header($context, array $blocks = array())
    {
        // line 10
        echo "<h1>Appartement</h1>
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
                <th>Qualite</th>
                <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "qualite"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Nombrelits</th>
                <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombreLits"), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

<h2>Prix</h2>

<table class=\"table table-striped\">
   <thead>
   <th>Nom</th>
   <th>Debut</th>
   <th>Fin</th>
   <th>Prix</th>
   <th>Stock</th>
</thead>
<tbody>
   ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "sejours"));
        foreach ($context['_seq'] as $context["_key"] => $context["sejour"]) {
            // line 50
            echo "      <tr>
         <td>";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sejour"]) ? $context["sejour"] : $this->getContext($context, "sejour")), "sejour"), "nom"), "html", null, true);
            echo "</td>
         <td>";
            // line 52
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sejour"]) ? $context["sejour"] : $this->getContext($context, "sejour")), "sejour"), "dateDebut"), "Y-m-d H:i:s"), "html", null, true);
            echo "</td>
         <td>";
            // line 53
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sejour"]) ? $context["sejour"] : $this->getContext($context, "sejour")), "sejour"), "dateDebut"), "Y-m-d H:i:s"), "html", null, true);
            echo "</td>
         <td>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sejour"]) ? $context["sejour"] : $this->getContext($context, "sejour")), "prix"), "html", null, true);
            echo "</td>
         <td>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sejour"]) ? $context["sejour"] : $this->getContext($context, "sejour")), "stock"), "html", null, true);
            echo "</td>

      </tr>
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sejour'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "
   </tbody>

</table>

";
    }

    // line 68
    public function block_container_header_right($context, array $blocks = array())
    {
        // line 69
        echo "<div class=\"btn-group\">
   <a class=\"btn \" href=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("appartement");
        echo "\">
      <i class=\"icon-chevron-left\"></i> 
      Back to the list
   </a>
   <a class=\"btn \" href=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("appartement_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
      <i class=\"icon-pencil\"></i> Edit</a>
</a>

</div>
";
    }

    public function getTemplateName()
    {
        return "BenskiCatalogueBundle:Appartement:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 74,  146 => 70,  113 => 53,  129 => 65,  65 => 25,  104 => 44,  270 => 126,  265 => 124,  261 => 112,  251 => 105,  245 => 97,  242 => 96,  233 => 105,  226 => 100,  218 => 92,  216 => 91,  213 => 90,  210 => 89,  205 => 113,  202 => 111,  200 => 89,  197 => 88,  190 => 69,  180 => 50,  148 => 16,  134 => 124,  77 => 47,  58 => 21,  53 => 13,  118 => 49,  100 => 38,  81 => 48,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 125,  264 => 84,  258 => 111,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 68,  132 => 51,  128 => 49,  107 => 36,  61 => 17,  273 => 127,  269 => 94,  254 => 106,  243 => 88,  240 => 86,  238 => 85,  235 => 107,  230 => 82,  227 => 81,  224 => 96,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 69,  135 => 53,  119 => 42,  102 => 50,  71 => 19,  67 => 19,  63 => 15,  59 => 14,  38 => 10,  94 => 51,  89 => 33,  85 => 49,  75 => 30,  68 => 28,  56 => 9,  87 => 25,  21 => 2,  26 => 6,  93 => 34,  88 => 50,  78 => 21,  46 => 13,  27 => 4,  44 => 10,  31 => 4,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 48,  166 => 71,  163 => 62,  158 => 19,  156 => 66,  151 => 17,  142 => 14,  138 => 54,  136 => 70,  121 => 55,  117 => 54,  105 => 51,  91 => 27,  62 => 25,  49 => 15,  24 => 4,  25 => 3,  19 => 1,  79 => 33,  72 => 29,  69 => 25,  47 => 9,  40 => 10,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 59,  123 => 115,  120 => 40,  115 => 43,  111 => 37,  108 => 79,  101 => 43,  98 => 49,  96 => 68,  83 => 25,  74 => 27,  66 => 15,  55 => 21,  52 => 17,  50 => 12,  43 => 11,  41 => 9,  35 => 4,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 68,  182 => 66,  176 => 49,  173 => 65,  168 => 47,  164 => 59,  162 => 20,  154 => 18,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 57,  109 => 52,  106 => 54,  103 => 77,  99 => 31,  95 => 28,  92 => 21,  86 => 28,  82 => 22,  80 => 19,  73 => 23,  64 => 18,  60 => 19,  57 => 14,  54 => 10,  51 => 19,  48 => 18,  45 => 8,  42 => 10,  39 => 9,  36 => 5,  33 => 5,  30 => 4,);
    }
}
