<?php

/* BladeTesterCalendarBundle:Event:listItem.html.twig */
class __TwigTemplate_ab20441a0d3191a3e32f292e9e70131c100b515798e8e762039899f510d23de6 extends Twig_Template
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
        echo "<li class=\"appointment ";
        if ($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "category")) {
            echo "appointment-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "category"), "color"), "html", null, true);
        }
        echo "\">";
        $this->env->loadTemplate("BladeTesterCalendarBundle:Event:event.html.twig")->display(array_merge($context, array("event" => (isset($context["event"]) ? $context["event"] : null))));
        echo "</li>";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:listItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,  135 => 23,  129 => 20,  126 => 19,  122 => 17,  106 => 14,  92 => 13,  89 => 12,  72 => 11,  59 => 9,  56 => 8,  39 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
