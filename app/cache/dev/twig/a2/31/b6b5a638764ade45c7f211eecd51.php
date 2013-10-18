<?php

/* BenskiCatalogueBundle:Destination:layout.html.twig */
class __TwigTemplate_a231b6b5a638764ade45c7f211eecd51 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenskiCatalogueBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'bundle_body' => array($this, 'block_bundle_body'),
            'left_menu' => array($this, 'block_left_menu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BenskiCatalogueBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Accueil - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_header($context, array $blocks = array())
    {
        // line 8
        echo "<h1>Destination</h1>
";
    }

    // line 12
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 13
        $this->displayParentBlock("breadcrumb", $context, $blocks);
        echo "
<li><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("destination");
        echo "\">Destination</a> <span class=\"divider\">/</span></li>

";
    }

    // line 18
    public function block_bundle_body($context, array $blocks = array())
    {
        // line 19
        echo "Attention, ce bloc est a définir

";
    }

    // line 23
    public function block_left_menu($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "BenskiCatalogueBundle:Destination:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 23,  67 => 19,  64 => 18,  57 => 14,  53 => 13,  50 => 12,  45 => 8,  35 => 4,  32 => 3,  123 => 51,  110 => 44,  105 => 42,  99 => 39,  95 => 38,  91 => 37,  85 => 36,  82 => 35,  78 => 34,  65 => 23,  62 => 21,  52 => 15,  49 => 14,  42 => 7,  39 => 9,  34 => 5,  31 => 4,);
    }
}
