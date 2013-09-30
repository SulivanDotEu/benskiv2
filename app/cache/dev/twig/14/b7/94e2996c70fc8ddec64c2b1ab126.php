<?php

/* BenskiCatalogueBundle::layout.html.twig */
class __TwigTemplate_14b794e2996c70fc8ddec64c2b1ab126 extends Twig_Template
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
        return "BenskiCatalogueBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 17,  46 => 13,  43 => 11,  40 => 10,  33 => 7,  30 => 6,  73 => 23,  67 => 19,  64 => 18,  57 => 14,  53 => 19,  50 => 16,  42 => 7,  35 => 4,  32 => 3,  94 => 38,  87 => 33,  75 => 27,  69 => 24,  62 => 20,  58 => 16,  52 => 18,  49 => 17,  45 => 8,  31 => 4,  28 => 3,);
    }
}
