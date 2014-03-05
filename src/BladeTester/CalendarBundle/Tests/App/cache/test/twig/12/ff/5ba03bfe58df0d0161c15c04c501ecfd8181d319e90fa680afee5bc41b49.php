<?php

/* BladeTesterCalendarBundle:Event:listByWeek.html.twig */
class __TwigTemplate_12ff5ba03bfe58df0d0161c15c04c501ecfd8181d319e90fa680afee5bc41b49 extends Twig_Template
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
                <span class=\"calendar-date-current-date\">
                    ";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Week from %from_day%, %from_month% of %from_year% to %to_day%, %to_month% of %to_year%", array("%from_day%" => twig_date_format_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : null), 0, array(), "array"), "d"), "%from_month%" => $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : null), 0, array(), "array"), "F")), "%from_year%" => twig_date_format_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : null), 0, array(), "array"), "Y"), "%to_day%" => twig_date_format_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : null), (twig_length_filter($this->env, (isset($context["dates"]) ? $context["dates"] : null)) - 1), array(), "array"), "d"), "%to_month%" => $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : null), (twig_length_filter($this->env, (isset($context["dates"]) ? $context["dates"] : null)) - 1), array(), "array"), "F")), "%to_year%" => twig_date_format_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : null), (twig_length_filter($this->env, (isset($context["dates"]) ? $context["dates"] : null)) - 1), array(), "array"), "Y"))), "html", null, true);
        // line 10
        echo "
                </span>
            </td>
            <td colspan=\"2\" class=\"dp-cell dp-sb-nav\">
                <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_week", array("year" => twig_date_format_filter($this->env, (isset($context["previous"]) ? $context["previous"] : null), "Y"), "month" => twig_date_format_filter($this->env, (isset($context["previous"]) ? $context["previous"] : null), "m"), "day" => twig_date_format_filter($this->env, (isset($context["previous"]) ? $context["previous"] : null), "d"))), "html", null, true);
        echo "\" class=\"btn\">&lt;</a>
                <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_week", array("year" => twig_date_format_filter($this->env, (isset($context["next"]) ? $context["next"] : null), "Y"), "month" => twig_date_format_filter($this->env, (isset($context["next"]) ? $context["next"] : null), "m"), "day" => twig_date_format_filter($this->env, (isset($context["next"]) ? $context["next"] : null), "d"))), "html", null, true);
        echo "\" class=\"btn\">&gt;</a>
            </td>
        </tr>
        </tbody>
    </table>
";
    }

    // line 22
    public function block_calendar_body($context, array $blocks = array())
    {
        // line 23
        echo "    <section class=\"schedule-content schedule-view-week\">
        <ul class=\"list-table\">
            <li class=\"list-table-header list-table-days\">
                <ul class=\"list-table-row\">
                    <li class=\"list-table-header-cell\"></li>
                    ";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
            // line 29
            echo "                        <li class=\"list-table-header-cell\">
                            <abbr title=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "l")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "D")), "html", null, true);
            echo "</abbr>
                            <time datetime=\"";
            // line 31
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "Y-m-d"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("%month%-%day%", array("%day%" => twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "d"), "%month%" => twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "m"))), "html", null, true);
            echo "</time>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                </ul>
            </li>

            <li class=\"list-table-body list-table-hours\">
                ";
        // line 38
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
            // line 39
            echo "                    <ul class=\"list-table-row\">
                        <li class=\"list-table-cell list-table-hour\">";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["hour"]) ? $context["hour"] : null), "html", null, true);
            echo ":00</li>
                        ";
            // line 41
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
                // line 42
                echo "                            <li class=\"list-table-cell\">
                                ";
                // line 43
                $this->env->loadTemplate("BladeTesterCalendarBundle:Event:group.html.twig")->display(array_merge($context, array("events" => $this->getAttribute((isset($context["events"]) ? $context["events"] : null), "allByDateAndTime", array(0 => (isset($context["date"]) ? $context["date"] : null), 1 => (isset($context["hour"]) ? $context["hour"] : null)), "method"))));
                // line 44
                echo "                                <a href=\"";
                echo $this->env->getExtension('routing')->getPath("calendar_event_add");
                echo "?year=";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "Y"), "html", null, true);
                echo "&month=";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "m"), "html", null, true);
                echo "&day=";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "d"), "html", null, true);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "                    </ul>
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
        // line 49
        echo "            </li>
        </ul>
    </section>

";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:listByWeek.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 49,  175 => 47,  147 => 44,  145 => 43,  142 => 42,  125 => 41,  121 => 40,  118 => 39,  101 => 38,  95 => 34,  84 => 31,  78 => 30,  75 => 29,  71 => 28,  64 => 23,  61 => 22,  51 => 15,  47 => 14,  41 => 10,  39 => 9,  32 => 4,  29 => 3,);
    }
}
