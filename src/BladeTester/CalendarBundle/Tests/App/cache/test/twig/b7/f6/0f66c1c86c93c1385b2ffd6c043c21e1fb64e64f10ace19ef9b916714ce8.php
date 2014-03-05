<?php

/* BladeTesterCalendarBundle:Event:base.html.twig */
class __TwigTemplate_b7f60f66c1c86c93c1385b2ffd6c043c21e1fb64e64f10ace19ef9b916714ce8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BladeTesterCalendarBundle:Base:base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'calendar_date_selector' => array($this, 'block_calendar_date_selector'),
            'calendar_sidebar' => array($this, 'block_calendar_sidebar'),
            'calendar_body' => array($this, 'block_calendar_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BladeTesterCalendarBundle:Base:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <h1 class=\"main-title\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.agenda"), "html", null, true);
        echo "</h1>

    <nav>
        <ul class=\"tabs-btn\">
            <li>
                <a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("calendar_event_list");
        echo "\" class=\"btn tab-btn tab-first";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method") == "calendar_event_list")) {
            echo " active";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.agenda"), "html", null, true);
        echo "</a>
            </li>
            <li>
                <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_day", array("year" => twig_date_format_filter($this->env, "now", "Y"), "month" => twig_date_format_filter($this->env, "now", "m"), "day" => twig_date_format_filter($this->env, "now", "d"))), "html", null, true);
        echo "\" class=\"btn tab-btn tab-middle";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method") == "calendar_event_list_by_day")) {
            echo " active";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.day"), "html", null, true);
        echo "</a></li>
            <li>
                <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_week", array("year" => twig_date_format_filter($this->env, "now", "Y"), "month" => twig_date_format_filter($this->env, "now", "m"), "day" => twig_date_format_filter($this->env, "now", "d"))), "html", null, true);
        echo "\" class=\"btn tab-btn tab-middle";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method") == "calendar_event_list_by_week")) {
            echo " active";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.week"), "html", null, true);
        echo "</a></li>
            <li>
                <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_month", array("year" => twig_date_format_filter($this->env, "now", "Y"), "month" => twig_date_format_filter($this->env, "now", "m"))), "html", null, true);
        echo "\" class=\"btn tab-btn tab-last";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method") == "calendar_event_list_by_month")) {
            echo " active";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.month"), "html", null, true);
        echo "</a></li>
        </ul>
    </nav>

    <nav class=\"list-options\">
        <ul class=\"list-inline column w-20\">
            <li>
                <a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("calendar_event_add");
        echo "?destination=";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route_params"), "method")), "html", null, true);
        echo "&year=";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "Y"), "html", null, true);
        echo "&month=";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "m"), "html", null, true);
        echo "&day=";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "d"), "html", null, true);
        echo "\" class=\"btn btn-primary\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.event.add"), "html", null, true);
        echo "</a>
            </li>
        </ul>
        <ul class=\"list-inline column w-80 t-align-right\">
            <li><a class=\"btn\" href=\"#\" onclick=\"window.print();return false;\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.print"), "html", null, true);
        echo "</a></li>
            <li><a class=\"btn\" href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("calendar_settings");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.settings"), "html", null, true);
        echo "</a></li>
        </ul>
    </nav>

    <section class=\"main-content\">
        <div class=\"schedule\">
            <section class=\"schedule-nav\">
                ";
        // line 35
        $this->displayBlock('calendar_date_selector', $context, $blocks);
        // line 37
        echo "                ";
        $this->displayBlock('calendar_sidebar', $context, $blocks);
        // line 40
        echo "            </section>

            ";
        // line 42
        $this->displayBlock('calendar_body', $context, $blocks);
        // line 44
        echo "        </div>
    </section>
";
    }

    // line 35
    public function block_calendar_date_selector($context, array $blocks = array())
    {
        // line 36
        echo "                ";
    }

    // line 37
    public function block_calendar_sidebar($context, array $blocks = array())
    {
        // line 38
        echo "                    ";
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("BladeTesterCalendarBundle:Calendar:showMini", array("year" => twig_date_format_filter($this->env, "now", "Y"), "month" => twig_date_format_filter($this->env, "now", "m"))), array());
        // line 39
        echo "                ";
    }

    // line 42
    public function block_calendar_body($context, array $blocks = array())
    {
        // line 43
        echo "            ";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 43,  160 => 42,  156 => 39,  153 => 38,  150 => 37,  146 => 36,  143 => 35,  137 => 44,  135 => 42,  131 => 40,  128 => 37,  126 => 35,  114 => 28,  110 => 27,  93 => 23,  77 => 16,  66 => 14,  55 => 12,  43 => 9,  34 => 4,  49 => 8,  47 => 7,  42 => 6,  40 => 5,  31 => 3,  28 => 3,);
    }
}
