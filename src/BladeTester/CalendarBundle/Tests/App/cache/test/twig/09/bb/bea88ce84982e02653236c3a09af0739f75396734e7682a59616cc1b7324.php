<?php

/* BladeTesterCalendarBundle:Event:listByDay.html.twig */
class __TwigTemplate_09bbbea88ce84982e02653236c3a09af0739f75396734e7682a59616cc1b7324 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BladeTesterCalendarBundle:Event:base.html.twig");

        $this->blocks = array(
            'calendar_date_selector' => array($this, 'block_calendar_date_selector'),
            'calendar_body' => array($this, 'block_calendar_body'),
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
    public function block_calendar_date_selector($context, array $blocks = array())
    {
        // line 4
        echo "    <table class=\"dp-monthtable\" role=\"presentation\">
        <tbody>
        <tr id=\"dp_0_header\" class=\"monthtableHeader\">
            <td colspan=\"5\" id=\"dp_0_cur\" class=\"dp-cell dp-sb-cur\">
                <span class=\"calHeaderSpace\">
                    ";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("%week_day%, %month% %day%th of %year%", array("%week_day%" => $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "l")), "%day%" => twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "d"), "%month%" => $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "F")), "%year%" => twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "Y"))), "html", null, true);
        echo "
                </span>
            </td>
            <td colspan=\"2\" class=\"dp-cell dp-sb-nav\">
                <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_day", array("year" => twig_date_format_filter($this->env, (isset($context["previous"]) ? $context["previous"] : null), "Y"), "month" => twig_date_format_filter($this->env, (isset($context["previous"]) ? $context["previous"] : null), "m"), "day" => twig_date_format_filter($this->env, (isset($context["previous"]) ? $context["previous"] : null), "d"))), "html", null, true);
        echo "\" class=\"btn\">&lt;</a>
                <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_day", array("year" => twig_date_format_filter($this->env, (isset($context["next"]) ? $context["next"] : null), "Y"), "month" => twig_date_format_filter($this->env, (isset($context["next"]) ? $context["next"] : null), "m"), "day" => twig_date_format_filter($this->env, (isset($context["next"]) ? $context["next"] : null), "d"))), "html", null, true);
        echo "\" class=\"btn\">&gt;</a>
            </td>
        </tr>
        </tbody>
    </table>
";
    }

    // line 21
    public function block_calendar_body($context, array $blocks = array())
    {
        // line 22
        echo "    <section class=\"schedule-content schedule-view-day\">
        <ul class=\"timetable\">
            ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 23));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["hour"]) {
            // line 25
            echo "            <li class=\"timetable-hour-block\">
                <time datetime=\"";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "Y-m-d"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["hour"]) ? $context["hour"] : null), "html", null, true);
            echo ":00\" class=\"timetable-hour\">";
            echo twig_escape_filter($this->env, (isset($context["hour"]) ? $context["hour"] : null), "html", null, true);
            echo ":00</time>
                ";
            // line 27
            $this->env->loadTemplate("BladeTesterCalendarBundle:Event:group.html.twig")->display(array_merge($context, array("events" => $this->getAttribute((isset($context["events"]) ? $context["events"] : null), "allByDateAndTime", array(0 => (isset($context["current"]) ? $context["current"] : null), 1 => (isset($context["hour"]) ? $context["hour"] : null)), "method"))));
            // line 28
            echo "                <a href=\"";
            echo $this->env->getExtension('routing')->getPath("calendar_event_add");
            echo "?year=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "Y"), "html", null, true);
            echo "&month=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "m"), "html", null, true);
            echo "&day=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "d"), "html", null, true);
            echo "&hour=";
            echo twig_escape_filter($this->env, (isset($context["hour"]) ? $context["hour"] : null), "html", null, true);
            echo "&destination=";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route_params"), "method")), "html", null, true);
            echo "\" class=\"full-link\"></a>
            </li>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hour'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "        </ul>
    </section>
";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:listByDay.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 31,  97 => 28,  95 => 27,  87 => 26,  84 => 25,  67 => 24,  63 => 22,  60 => 21,  50 => 14,  46 => 13,  39 => 9,  32 => 4,  29 => 3,);
    }
}
