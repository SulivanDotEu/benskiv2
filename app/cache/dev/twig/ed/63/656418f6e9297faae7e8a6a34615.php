<?php

/* BenskiNewsBundle::layout.html.twig */
class __TwigTemplate_ed63656418f6e9297faae7e8a6a34615 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'bundle_body' => array($this, 'block_bundle_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        // line 7
        echo "  Blog - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo " 
  ";
        // line 13
        echo "
 
  ";
        // line 16
        echo "  ";
        $this->displayBlock('bundle_body', $context, $blocks);
        // line 19
        echo " 
";
    }

    // line 16
    public function block_bundle_body($context, array $blocks = array())
    {
        // line 17
        echo "  
  ";
    }

    public function getTemplateName()
    {
        return "BenskiNewsBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 17,  58 => 16,  46 => 13,  33 => 7,  30 => 6,  73 => 23,  67 => 19,  64 => 18,  57 => 14,  45 => 8,  42 => 7,  166 => 30,  163 => 29,  153 => 77,  146 => 72,  134 => 66,  129 => 64,  123 => 61,  119 => 60,  115 => 59,  111 => 58,  105 => 57,  99 => 56,  96 => 55,  92 => 54,  68 => 32,  66 => 29,  63 => 22,  53 => 19,  50 => 16,  43 => 11,  40 => 10,  35 => 4,  32 => 3,);
    }
}
