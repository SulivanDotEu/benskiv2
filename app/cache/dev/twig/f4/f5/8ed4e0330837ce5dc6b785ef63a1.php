<?php

/* BenskiNewsBundle:News:show.html.twig */
class __TwigTemplate_f4f58ed4e0330837ce5dc6b785ef63a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenskiNewsBundle:News:layout.html.twig");

        $this->blocks = array(
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'container_header_right' => array($this, 'block_container_header_right'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BenskiNewsBundle:News:layout.html.twig";
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
        echo "<h1>News</h1>
";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "<table class=\"table table-striped\">
        <tbody>
            <tr>
                <th>Titre</th>
                <td>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "titre"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Contenu</th>
                <td>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contenu"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Resumé</th>
                <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "resume"), "html", null, true);
        echo "</td>
            </tr>            
            <tr>
                <th>Auteur</th>
                <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "titre"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Tags</th>
                <td>";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tag"), "html", null, true);
        echo "</td>
            </tr>            
        </tbody>
    </table>


";
    }

    // line 47
    public function block_container_header_right($context, array $blocks = array())
    {
        // line 48
        echo "<div class=\"btn-group\">
   <a class=\"btn \" href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("news");
        echo "\">
      <i class=\"icon-chevron-left\"></i> 
      Back to the list
   </a>
   <a class=\"btn \" href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("news_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
      <i class=\"icon-pencil\"></i> Edit</a>
</a>

</div>
";
    }

    public function getTemplateName()
    {
        return "BenskiNewsBundle:News:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 114,  228 => 101,  225 => 100,  222 => 99,  195 => 87,  192 => 86,  188 => 85,  181 => 81,  137 => 64,  124 => 51,  160 => 78,  150 => 74,  114 => 44,  127 => 62,  97 => 47,  84 => 35,  110 => 53,  153 => 77,  146 => 72,  113 => 53,  129 => 64,  65 => 25,  104 => 38,  270 => 126,  265 => 124,  261 => 112,  251 => 105,  245 => 113,  242 => 96,  233 => 105,  226 => 100,  218 => 92,  216 => 91,  213 => 90,  210 => 89,  205 => 113,  202 => 111,  200 => 89,  197 => 88,  190 => 69,  180 => 50,  148 => 67,  134 => 66,  77 => 29,  58 => 21,  53 => 15,  118 => 60,  100 => 48,  81 => 34,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 125,  264 => 84,  258 => 111,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 92,  177 => 80,  169 => 60,  140 => 68,  132 => 51,  128 => 49,  107 => 51,  61 => 17,  273 => 127,  269 => 94,  254 => 106,  243 => 88,  240 => 86,  238 => 85,  235 => 105,  230 => 82,  227 => 81,  224 => 96,  221 => 77,  219 => 76,  217 => 75,  208 => 91,  204 => 72,  179 => 69,  159 => 61,  143 => 69,  135 => 70,  119 => 60,  102 => 46,  71 => 26,  67 => 19,  63 => 22,  59 => 21,  38 => 10,  94 => 34,  89 => 39,  85 => 36,  75 => 27,  68 => 32,  56 => 19,  87 => 30,  21 => 2,  26 => 6,  93 => 33,  88 => 38,  78 => 34,  46 => 13,  27 => 4,  44 => 10,  31 => 4,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 48,  166 => 30,  163 => 29,  158 => 70,  156 => 66,  151 => 68,  142 => 72,  138 => 71,  136 => 57,  121 => 61,  117 => 54,  105 => 57,  91 => 37,  62 => 25,  49 => 15,  24 => 4,  25 => 3,  19 => 1,  79 => 33,  72 => 29,  69 => 27,  47 => 9,  40 => 9,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 69,  123 => 61,  120 => 58,  115 => 59,  111 => 58,  108 => 79,  101 => 39,  98 => 49,  96 => 55,  83 => 29,  74 => 30,  66 => 29,  55 => 21,  52 => 17,  50 => 14,  43 => 10,  41 => 9,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 88,  193 => 73,  189 => 71,  187 => 68,  182 => 66,  176 => 49,  173 => 79,  168 => 47,  164 => 59,  162 => 71,  154 => 18,  149 => 51,  147 => 58,  144 => 49,  141 => 65,  133 => 63,  130 => 41,  125 => 44,  122 => 47,  116 => 41,  112 => 43,  109 => 42,  106 => 54,  103 => 49,  99 => 56,  95 => 38,  92 => 54,  86 => 37,  82 => 35,  80 => 33,  73 => 23,  64 => 18,  60 => 22,  57 => 14,  54 => 22,  51 => 19,  48 => 18,  45 => 8,  42 => 7,  39 => 9,  36 => 6,  33 => 5,  30 => 4,);
    }
}
