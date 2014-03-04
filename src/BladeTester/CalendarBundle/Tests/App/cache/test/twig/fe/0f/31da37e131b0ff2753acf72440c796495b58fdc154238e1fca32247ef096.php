<?php

/* BladeTesterCalendarBundle:Event:add.html.twig */
class __TwigTemplate_fe0f31da37e131b0ff2753acf72440c796495b58fdc154238e1fca32247ef096 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BladeTesterCalendarBundle:Event:base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BladeTesterCalendarBundle:Event:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<form id=\"event-add\" method=\"POST\" action=\"";
        echo $this->env->getExtension('routing')->getUrl("calendar_event_add");
        echo "?destination=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "get", array(0 => "destination"), "method"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
    ";
        // line 5
        $this->env->loadTemplate("BladeTesterCalendarBundle:Event:form.html.twig")->display($context);
        // line 6
        echo "    <input type=\"submit\" value=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.event.add"), "html", null, true);
        echo "\" /> 
    ";
        // line 7
        $this->env->loadTemplate("BladeTesterCalendarBundle:Event:cancel.html.twig")->display($context);
        // line 8
        echo "</form>
";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 8,  47 => 7,  42 => 6,  40 => 5,  31 => 4,  28 => 3,);
    }
}
