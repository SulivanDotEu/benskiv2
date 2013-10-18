<?php

/* BenskiCatalogueBundle:Destination:new.html.twig */
class __TwigTemplate_4994a0a7f97fdfaae1d0400154fc7e20 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenskiCatalogueBundle:Destination:layout.html.twig");

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BenskiCatalogueBundle:Destination:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Destination creation</h1>
";
    }

    // line 9
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("breadcrumb", $context, $blocks);
        echo "
<li class=\"active\">new entity</li>
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 20
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("destination");
        echo "\">
            Back to the list
        </a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "BenskiCatalogueBundle:Destination:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 44,  153 => 74,  146 => 70,  129 => 65,  65 => 23,  104 => 44,  266 => 128,  261 => 126,  257 => 114,  250 => 108,  231 => 109,  222 => 102,  212 => 93,  206 => 91,  198 => 113,  186 => 71,  127 => 83,  113 => 53,  58 => 24,  53 => 13,  118 => 79,  100 => 38,  81 => 48,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 127,  258 => 81,  252 => 80,  247 => 107,  241 => 99,  229 => 107,  220 => 98,  214 => 94,  177 => 20,  169 => 18,  140 => 68,  132 => 51,  128 => 49,  107 => 36,  61 => 17,  273 => 96,  269 => 129,  254 => 113,  243 => 88,  240 => 86,  238 => 98,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 69,  135 => 53,  119 => 42,  102 => 50,  71 => 19,  67 => 19,  63 => 15,  59 => 14,  38 => 9,  94 => 51,  89 => 51,  85 => 36,  75 => 30,  68 => 28,  56 => 29,  87 => 25,  21 => 2,  26 => 6,  93 => 34,  88 => 50,  78 => 34,  46 => 13,  27 => 4,  44 => 10,  31 => 4,  28 => 2,  201 => 115,  196 => 91,  183 => 70,  171 => 61,  166 => 17,  163 => 16,  158 => 67,  156 => 66,  151 => 131,  142 => 59,  138 => 117,  136 => 70,  121 => 55,  117 => 54,  105 => 42,  91 => 37,  62 => 21,  49 => 14,  24 => 4,  25 => 3,  19 => 1,  79 => 33,  72 => 29,  69 => 40,  47 => 9,  40 => 10,  37 => 10,  22 => 2,  246 => 90,  157 => 14,  145 => 46,  139 => 45,  131 => 59,  123 => 51,  120 => 40,  115 => 43,  111 => 70,  108 => 36,  101 => 43,  98 => 49,  96 => 31,  83 => 25,  74 => 27,  66 => 15,  55 => 21,  52 => 15,  50 => 12,  43 => 14,  41 => 10,  35 => 4,  32 => 3,  29 => 3,  209 => 92,  203 => 78,  199 => 67,  193 => 90,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 19,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 126,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 57,  109 => 52,  106 => 54,  103 => 32,  99 => 39,  95 => 38,  92 => 21,  86 => 28,  82 => 35,  80 => 19,  73 => 23,  64 => 18,  60 => 19,  57 => 14,  54 => 10,  51 => 20,  48 => 18,  45 => 8,  42 => 10,  39 => 9,  36 => 5,  33 => 6,  30 => 5,);
    }
}
