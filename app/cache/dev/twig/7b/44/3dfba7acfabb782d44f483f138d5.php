<?php

/* BenskiNewsBundle:News:new.html.twig */
class __TwigTemplate_7b443dfba7acfabb782d44f483f138d5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenskiNewsBundle:News:layout.html.twig");

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'body' => array($this, 'block_body'),
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
    public function block_header($context, array $blocks = array())
    {
        // line 5
        echo "<h1>News creation</h1>
";
    }

    // line 10
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 11
        $this->displayParentBlock("breadcrumb", $context, $blocks);
        echo "
<li class=\"active\">new entity</li>
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        echo "<h1>News creation</h1>

    ";
        // line 21
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("news");
        echo "\">
            Back to the list
        </a>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "BenskiNewsBundle:News:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 66,  248 => 114,  245 => 113,  228 => 101,  225 => 100,  195 => 87,  192 => 86,  188 => 85,  181 => 81,  148 => 67,  137 => 64,  124 => 51,  160 => 78,  150 => 74,  114 => 44,  97 => 34,  77 => 29,  84 => 35,  110 => 41,  153 => 77,  146 => 72,  129 => 64,  65 => 26,  104 => 38,  266 => 128,  261 => 126,  257 => 114,  250 => 108,  231 => 109,  222 => 99,  212 => 93,  206 => 91,  198 => 113,  186 => 71,  127 => 62,  113 => 53,  58 => 22,  53 => 15,  118 => 60,  100 => 37,  81 => 34,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 127,  258 => 81,  252 => 80,  247 => 107,  241 => 99,  229 => 107,  220 => 98,  214 => 92,  177 => 80,  169 => 18,  140 => 68,  132 => 51,  128 => 49,  107 => 51,  61 => 17,  273 => 96,  269 => 129,  254 => 113,  243 => 88,  240 => 86,  238 => 98,  235 => 105,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 91,  204 => 72,  179 => 69,  159 => 61,  143 => 69,  135 => 70,  119 => 60,  102 => 46,  71 => 26,  67 => 19,  63 => 22,  59 => 21,  38 => 10,  94 => 34,  89 => 39,  85 => 36,  75 => 27,  68 => 32,  56 => 19,  87 => 30,  21 => 2,  26 => 6,  93 => 33,  88 => 38,  78 => 34,  46 => 13,  27 => 4,  44 => 9,  31 => 4,  28 => 3,  201 => 115,  196 => 91,  183 => 70,  171 => 61,  166 => 30,  163 => 29,  158 => 70,  156 => 66,  151 => 68,  142 => 72,  138 => 71,  136 => 57,  121 => 61,  117 => 54,  105 => 57,  91 => 37,  62 => 25,  49 => 15,  24 => 4,  25 => 3,  19 => 1,  79 => 28,  72 => 27,  69 => 27,  47 => 9,  40 => 9,  37 => 10,  22 => 2,  246 => 90,  157 => 14,  145 => 46,  139 => 45,  131 => 69,  123 => 61,  120 => 58,  115 => 59,  111 => 58,  108 => 36,  101 => 39,  98 => 49,  96 => 55,  83 => 29,  74 => 30,  66 => 29,  55 => 21,  52 => 16,  50 => 14,  43 => 10,  41 => 11,  35 => 5,  32 => 4,  29 => 3,  209 => 92,  203 => 78,  199 => 88,  193 => 90,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 79,  168 => 72,  164 => 59,  162 => 71,  154 => 58,  149 => 126,  147 => 58,  144 => 49,  141 => 65,  133 => 63,  130 => 41,  125 => 44,  122 => 47,  116 => 41,  112 => 43,  109 => 42,  106 => 54,  103 => 32,  99 => 56,  95 => 38,  92 => 54,  86 => 28,  82 => 35,  80 => 33,  73 => 23,  64 => 18,  60 => 22,  57 => 14,  54 => 22,  51 => 19,  48 => 18,  45 => 8,  42 => 7,  39 => 9,  36 => 6,  33 => 5,  30 => 4,);
    }
}
