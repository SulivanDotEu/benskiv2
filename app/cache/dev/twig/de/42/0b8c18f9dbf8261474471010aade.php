<?php

/* BenskiNewsBundle:News:index.html.twig */
class __TwigTemplate_de420b8c18f9dbf8261474471010aade extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenskiNewsBundle:News:layout.html.twig");

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'container_header_right' => array($this, 'block_container_header_right'),
            'body' => array($this, 'block_body'),
            'menuFactory' => array($this, 'block_menuFactory'),
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
        echo "<h1>News list</h1>
";
    }

    // line 9
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 10
        $this->displayParentBlock("breadcrumb", $context, $blocks);
        echo "
<li class=\"active\">list</li>
";
    }

    // line 14
    public function block_container_header_right($context, array $blocks = array())
    {
        // line 15
        echo "<a class=\"btn btn-primary\" href=\"";
        echo $this->env->getExtension('routing')->getPath("news_new");
        echo "\">
   <i class=\"icon-plus icon-white\"></i> 
   Create a new entry
</a>
";
    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
        // line 29
        $this->displayBlock('menuFactory', $context, $blocks);
        // line 32
        echo "    
            
            
            
            
            
    
    
<h1>News list</h1>

<table class=\"table table-striped table-condensed\">
   <thead>
      <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Resumé</th>
        <th>Auteur</th>
        <th>Tags</th>
      </tr>
   </thead>
   <tbody>
        ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 55
            echo "         <tr>
            <td><a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("news_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</a></td>
            <td><a href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("news_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "titre"), "html", null, true);
            echo "</a></td>
            <td>";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contenu"), "html", null, true);
            echo "</td>
            <td>";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "resume"), "html", null, true);
            echo "</td>
            <td>";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "auteur"), "html", null, true);
            echo "</td>
            <td>";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tag"), "html", null, true);
            echo "</td>
            <td>
               <div class=\"btn-group\">
                  <a class=\"btn\" href=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("news_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo " \">
                     <i class=\"icon-eye-open\"></i> Show</a>
                  <a class=\"btn\" href=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("news_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">
                     <i class=\"icon-pencil\"></i> Edit</a>
               </div>
            </td>
         </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "      </tbody>
   </table>

   <ul>
      <li>
         <a href=\"";
        // line 77
        echo $this->env->getExtension('routing')->getPath("news_new");
        echo "\">
            Create a new entry
         </a>
      </li>
   </ul>
    ";
    }

    // line 29
    public function block_menuFactory($context, array $blocks = array())
    {
        // line 30
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "BenskiNewsBundle:News:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 30,  163 => 29,  153 => 77,  146 => 72,  134 => 66,  129 => 64,  123 => 61,  119 => 60,  115 => 59,  111 => 58,  105 => 57,  99 => 56,  96 => 55,  92 => 54,  68 => 32,  66 => 29,  63 => 22,  53 => 15,  50 => 14,  43 => 10,  40 => 9,  35 => 5,  32 => 4,);
    }
}
