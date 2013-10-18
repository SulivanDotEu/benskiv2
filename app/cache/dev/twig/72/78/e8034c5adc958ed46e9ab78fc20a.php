<?php

/* ::flashbag.html.twig */
class __TwigTemplate_7278e8034c5adc958ed46e9ab78fc20a extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notification"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 4
            echo "
<div class=\"alert alert-";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : $this->getContext($context, "m")), "type"), "html", null, true);
            echo "\">
   <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        ";
            // line 7
            if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "title", array(), "any", true, true)) {
                // line 8
                echo "   <b>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : $this->getContext($context, "m")), "title"), "html", null, true);
                echo "</b>
        ";
            }
            // line 10
            echo "   ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : $this->getContext($context, "m")), "content"), "html", null, true);
            echo "
   <br>

          ";
            // line 13
            if ($this->getAttribute((isset($context["m"]) ? $context["m"] : null), "exception_dump", array(), "any", true, true)) {
                // line 14
                echo "   <i>
            ";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : $this->getContext($context, "m")), "exception_dump"), "html", null, true);
                echo "
      </i>
        ";
            }
            // line 18
            echo "   </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "::flashbag.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 18,  54 => 15,  51 => 14,  49 => 13,  36 => 8,  34 => 7,  29 => 5,  26 => 4,  22 => 3,  19 => 2,  269 => 129,  266 => 128,  264 => 127,  261 => 126,  257 => 114,  254 => 113,  250 => 108,  247 => 107,  241 => 99,  238 => 98,  231 => 109,  229 => 107,  222 => 102,  220 => 98,  214 => 94,  212 => 93,  209 => 92,  206 => 91,  201 => 115,  198 => 113,  196 => 91,  193 => 90,  186 => 71,  183 => 70,  177 => 20,  173 => 19,  169 => 18,  157 => 14,  151 => 131,  149 => 126,  138 => 117,  136 => 90,  127 => 83,  118 => 79,  113 => 75,  89 => 51,  85 => 50,  81 => 49,  69 => 40,  56 => 29,  48 => 16,  28 => 2,  61 => 17,  58 => 16,  46 => 13,  33 => 7,  30 => 6,  73 => 23,  67 => 19,  64 => 18,  57 => 14,  45 => 8,  42 => 10,  166 => 17,  163 => 16,  153 => 77,  146 => 72,  134 => 66,  129 => 64,  123 => 81,  119 => 60,  115 => 59,  111 => 70,  105 => 57,  99 => 56,  96 => 55,  92 => 54,  68 => 32,  66 => 29,  63 => 22,  53 => 19,  50 => 22,  43 => 14,  40 => 10,  35 => 4,  32 => 5,);
    }
}
