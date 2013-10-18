<?php

/* WebProfilerBundle:Collector:exception.css.twig */
class __TwigTemplate_f3ac5bcd35a565ac1de37db411a3a265 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo ".sf-reset .traces {
    padding-bottom: 14px;
}
.sf-reset .traces li {
    font-size: 12px;
    color: #868686;
    padding: 5px 4px;
    list-style-type: decimal;
    margin-left: 20px;
    white-space: break-word;
}
.sf-reset #logs .traces li.error {
    font-style: normal;
    color: #AA3333;
    background: #f9ecec;
}
.sf-reset #logs .traces li.warning {
    font-style: normal;
    background: #ffcc00;
}
/* fix for Opera not liking empty <li> */
.sf-reset .traces li:after {
    content: \"\\00A0\";
}
.sf-reset .trace {
    border: 1px solid #D3D3D3;
    padding: 10px;
    overflow: auto;
    margin: 10px 0 20px;
}
.sf-reset .block-exception {
    border-radius: 16px;
    margin-bottom: 20px;
    background-color: #f6f6f6;
    border: 1px solid #dfdfdf;
    padding: 30px 28px;
    word-wrap: break-word;
    overflow: hidden;
}
.sf-reset .block-exception div {
    color: #313131;
    font-size: 10px;
}
.sf-reset .block-exception-detected .illustration-exception,
.sf-reset .block-exception-detected .text-exception {
    float: left;
}
.sf-reset .block-exception-detected .illustration-exception {
    width: 152px;
}
.sf-reset .block-exception-detected .text-exception {
    width: 670px;
    padding: 30px 44px 24px 46px;
    position: relative;
}
.sf-reset .text-exception .open-quote,
.sf-reset .text-exception .close-quote {
    position: absolute;
}
.sf-reset .open-quote {
    top: 0;
    left: 0;
}
.sf-reset .close-quote {
    bottom: 0;
    right: 50px;
}
.sf-reset .block-exception p {
    font-family: Arial, Helvetica, sans-serif;
}
.sf-reset .block-exception p a,
.sf-reset .block-exception p a:hover {
    color: #565656;
}
.sf-reset .logs h2 {
    float: left;
    width: 654px;
}
.sf-reset .error-count {
    float: right;
    width: 170px;
    text-align: right;
}
.sf-reset .error-count span {
    display: inline-block;
    background-color: #aacd4e;
    border-radius: 6px;
    padding: 4px;
    color: white;
    margin-right: 2px;
    font-size: 11px;
    font-weight: bold;
}
.sf-reset .toggle {
    vertical-align: middle;
}
.sf-reset .linked ul,
.sf-reset .linked li {
    display: inline;
}
.sf-reset #output-content {
    color: #000;
    font-size: 12px;
}
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:exception.css.twig";
    }

    public function getDebugInfo()
    {
        return array (  175 => 65,  161 => 63,  76 => 31,  462 => 202,  449 => 198,  446 => 197,  441 => 196,  439 => 195,  431 => 189,  429 => 188,  422 => 184,  415 => 180,  408 => 176,  401 => 172,  394 => 168,  380 => 160,  373 => 156,  361 => 146,  351 => 141,  348 => 140,  342 => 137,  338 => 135,  335 => 134,  329 => 131,  325 => 129,  323 => 128,  320 => 127,  315 => 125,  303 => 122,  300 => 121,  289 => 113,  286 => 112,  275 => 105,  270 => 102,  267 => 101,  262 => 98,  256 => 96,  233 => 87,  226 => 84,  216 => 79,  213 => 78,  207 => 75,  200 => 72,  197 => 71,  194 => 70,  191 => 67,  185 => 66,  178 => 66,  172 => 64,  165 => 60,  90 => 27,  70 => 19,  134 => 54,  248 => 94,  245 => 113,  228 => 101,  225 => 100,  195 => 87,  192 => 86,  188 => 85,  181 => 65,  148 => 67,  137 => 64,  124 => 51,  160 => 78,  150 => 55,  114 => 44,  97 => 47,  77 => 29,  84 => 24,  110 => 53,  153 => 56,  146 => 72,  129 => 64,  65 => 25,  104 => 38,  266 => 128,  261 => 126,  257 => 114,  250 => 108,  231 => 109,  222 => 99,  212 => 93,  206 => 91,  198 => 113,  186 => 71,  127 => 62,  113 => 48,  58 => 21,  53 => 12,  118 => 49,  100 => 39,  81 => 23,  34 => 5,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 199,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 164,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 143,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 124,  309 => 97,  305 => 95,  298 => 120,  294 => 90,  285 => 89,  283 => 88,  278 => 106,  268 => 85,  264 => 127,  258 => 81,  252 => 80,  247 => 107,  241 => 90,  229 => 85,  220 => 81,  214 => 92,  177 => 80,  169 => 18,  140 => 58,  132 => 51,  128 => 49,  107 => 51,  61 => 17,  273 => 96,  269 => 129,  254 => 113,  243 => 88,  240 => 86,  238 => 98,  235 => 105,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 91,  204 => 72,  179 => 69,  159 => 61,  143 => 69,  135 => 70,  119 => 40,  102 => 40,  71 => 26,  67 => 24,  63 => 22,  59 => 14,  38 => 6,  94 => 34,  89 => 39,  85 => 36,  75 => 27,  68 => 32,  56 => 19,  87 => 34,  21 => 2,  26 => 6,  93 => 33,  88 => 38,  78 => 34,  46 => 13,  27 => 3,  44 => 10,  31 => 4,  28 => 3,  201 => 115,  196 => 91,  183 => 70,  171 => 61,  166 => 30,  163 => 29,  158 => 62,  156 => 58,  151 => 59,  142 => 72,  138 => 71,  136 => 57,  121 => 50,  117 => 54,  105 => 34,  91 => 37,  62 => 25,  49 => 14,  24 => 4,  25 => 3,  19 => 1,  79 => 33,  72 => 29,  69 => 27,  47 => 9,  40 => 9,  37 => 10,  22 => 2,  246 => 93,  157 => 14,  145 => 46,  139 => 45,  131 => 69,  123 => 42,  120 => 58,  115 => 59,  111 => 47,  108 => 36,  101 => 39,  98 => 49,  96 => 37,  83 => 33,  74 => 30,  66 => 29,  55 => 16,  52 => 17,  50 => 14,  43 => 12,  41 => 9,  35 => 6,  32 => 5,  29 => 3,  209 => 92,  203 => 73,  199 => 88,  193 => 90,  189 => 71,  187 => 84,  182 => 66,  176 => 63,  173 => 79,  168 => 61,  164 => 59,  162 => 59,  154 => 60,  149 => 126,  147 => 54,  144 => 49,  141 => 51,  133 => 63,  130 => 46,  125 => 51,  122 => 47,  116 => 39,  112 => 43,  109 => 42,  106 => 54,  103 => 49,  99 => 31,  95 => 38,  92 => 54,  86 => 37,  82 => 35,  80 => 32,  73 => 20,  64 => 23,  60 => 22,  57 => 14,  54 => 22,  51 => 19,  48 => 18,  45 => 10,  42 => 7,  39 => 9,  36 => 6,  33 => 4,  30 => 3,);
    }
}
