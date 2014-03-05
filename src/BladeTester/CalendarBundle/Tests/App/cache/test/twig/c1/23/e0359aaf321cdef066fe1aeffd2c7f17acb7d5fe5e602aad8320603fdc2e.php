<?php

/* BladeTesterCalendarBundle:Event:cancel.html.twig */
class __TwigTemplate_c123e0359aaf321cdef066fe1aeffd2c7f17acb7d5fe5e602aad8320603fdc2e extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("or"), "html", null, true);
        echo " <a href=\"
";
        // line 2
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "get", array(0 => "destination"), "method") && ($this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route_params"), "method")) != $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "get", array(0 => "destination"), "method")))) {
            // line 4
            echo "    ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "get", array(0 => "destination"), "method"), "html", null, true);
            echo "
";
        } else {
            // line 6
            echo "    ";
            echo $this->env->getExtension('routing')->getPath("calendar_event_list");
            echo "
";
        }
        // line 8
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.cancel"), "html", null, true);
        echo "</a>";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:cancel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  25 => 4,  23 => 2,  19 => 1,  163 => 43,  160 => 42,  156 => 39,  153 => 38,  150 => 37,  146 => 36,  143 => 35,  137 => 44,  135 => 42,  131 => 40,  128 => 37,  126 => 35,  114 => 28,  110 => 27,  93 => 23,  77 => 16,  66 => 14,  55 => 12,  43 => 9,  34 => 4,  49 => 8,  47 => 7,  42 => 6,  40 => 5,  31 => 6,  28 => 3,);
    }
}
