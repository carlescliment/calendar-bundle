<?php

/* BladeTesterCalendarBundle:Event:event.html.twig */
class __TwigTemplate_a4edd7cc28d6fb59e5169b05614f9e468f11fd1abb9ae077952c5b98cd97d7bb extends Twig_Template
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
        echo "<p>
  <time datetime=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "start"), "Y-m-d H:i"), "html", null, true);
        echo "\" class=\"appointment-date\">";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "start"), "H:i"), "html", null, true);
        echo "</time>
  <a href=\"#\" class=\"appointment-issue\">";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "title"), "html", null, true);
        echo "</a>
</p>
<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_edit", array("id" => $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "id"))), "html", null, true);
        echo "?destination=";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route_params"), "method")), "html", null, true);
        echo "\" class=\"full-link\" title=\"";
        if ($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "category")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "category"), "name"), "html", null, true);
            echo " :: ";
        }
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "title"), "html", null, true);
        echo "\"></a>
";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:event.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 5,  22 => 2,  19 => 1,  135 => 23,  129 => 20,  126 => 19,  122 => 17,  106 => 14,  92 => 13,  89 => 12,  72 => 11,  59 => 9,  56 => 8,  39 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
