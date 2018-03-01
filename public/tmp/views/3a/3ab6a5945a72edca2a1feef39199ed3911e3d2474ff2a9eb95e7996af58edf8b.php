<?php

/* home.twig */
class __TwigTemplate_84c10866b834a77baa671531827c886f8fb90c5830c1e1052774e23e75d9653c extends Twig_Template
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
        echo "<h1>";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "</h1>";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.twig", "C:\\Users\\ruiter\\PhpstormProjects\\orm-slim-example2\\public\\Templates\\home.twig");
    }
}
