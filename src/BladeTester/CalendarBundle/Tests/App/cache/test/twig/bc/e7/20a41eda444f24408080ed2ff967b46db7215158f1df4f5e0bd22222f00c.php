<?php

/* BladeTesterCalendarBundle:Event:edit.html.twig */
class __TwigTemplate_bce720a41eda444f24408080ed2ff967b46db7215158f1df4f5e0bd22222f00c extends Twig_Template
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
        echo "<form id=\"event-edit\" method=\"POST\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("calendar_event_edit", array("id" => $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "id"))), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.event.update"), "html", null, true);
        echo "\" />
    <a class=\"btn delete\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_delete", array("id" => $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "id"))), "html", null, true);
        echo "?destination=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "get", array(0 => "destination"), "method"), "html", null, true);
        echo "\" onclick=\"return confirm('";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.event.delete_warning"), "html", null, true);
        echo "')\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.event.delete"), "html", null, true);
        echo "</a>
    ";
        // line 8
        $this->env->loadTemplate("BladeTesterCalendarBundle:Event:cancel.html.twig")->display($context);
        // line 9
        echo "</form>
";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 9,  57 => 8,  47 => 7,  42 => 6,  40 => 5,  31 => 4,  28 => 3,);
    }
}
