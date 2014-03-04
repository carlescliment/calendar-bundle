<?php

/* BladeTesterCalendarBundle:Event:listByMonth.html.twig */
class __TwigTemplate_5500581f45fabf55d88c7d53334fdcc66156d96827da665499ae25dee835fd7a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BladeTesterCalendarBundle:Event:base.html.twig");

        $this->blocks = array(
            'calendar_date_selector' => array($this, 'block_calendar_date_selector'),
            'calendar_body' => array($this, 'block_calendar_body'),
            'javascripts' => array($this, 'block_javascripts'),
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

    // line 4
    public function block_calendar_date_selector($context, array $blocks = array())
    {
        // line 5
        echo "    <table class=\"dp-monthtable\" role=\"presentation\">
        <tbody>
        <tr id=\"dp_0_header\" class=\"monthtableHeader\">
            <td colspan=\"5\" id=\"dp_0_cur\" class=\"dp-cell dp-sb-cur\">
                <span class=\"calendar-date-current-date\">
                    ";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("%month% of %year%", array("%month%" => $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "F")), "%year%" => twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "Y"))), "html", null, true);
        echo "
                </span>
            </td>
            <td colspan=\"2\" class=\"dp-cell dp-sb-nav\">
                <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_month", array("year" => twig_date_format_filter($this->env, (isset($context["previous"]) ? $context["previous"] : null), "Y"), "month" => twig_date_format_filter($this->env, (isset($context["previous"]) ? $context["previous"] : null), "m"))), "html", null, true);
        echo "\" class=\"btn\">&lt;</a>
                <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_month", array("year" => twig_date_format_filter($this->env, (isset($context["next"]) ? $context["next"] : null), "Y"), "month" => twig_date_format_filter($this->env, (isset($context["next"]) ? $context["next"] : null), "m"))), "html", null, true);
        echo "\" class=\"btn\">&gt;</a>
            </td>
        </tr>
        </tbody>
    </table>
";
    }

    // line 23
    public function block_calendar_body($context, array $blocks = array())
    {
        // line 24
        echo "    <section class=\"schedule-content schedule-view-month\">

        <ul class=\"list-table\">
            <li class=\"list-table-header\">
                <ul class=\"list-table-row\">
                    <li class=\"list-table-header-cell\"><abbr title=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("monday"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.abbr.monday"), "html", null, true);
        echo "</abbr></li>
                    <li class=\"list-table-header-cell\"><abbr title=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("tuesday"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.abbr.tuesday"), "html", null, true);
        echo "</abbr></li>
                    <li class=\"list-table-header-cell\"><abbr title=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("wednesday"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.abbr.wednesday"), "html", null, true);
        echo "</abbr></li>
                    <li class=\"list-table-header-cell\"><abbr title=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("thursday"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.abbr.thursday"), "html", null, true);
        echo "</abbr></li>
                    <li class=\"list-table-header-cell\"><abbr title=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("friday"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.abbr.friday"), "html", null, true);
        echo "</abbr></li>
                    <li class=\"list-table-header-cell\"><abbr title=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("saturday"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.abbr.saturday"), "html", null, true);
        echo "</abbr></li>
                    <li class=\"list-table-header-cell\"><abbr title=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("sunday"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.abbr.sunday"), "html", null, true);
        echo "</abbr></li>
                </ul>
            </li>
            <li class=\"list-table-body\">
                ";
        // line 39
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
            // line 40
            echo "                    ";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") % 7) == 0)) {
                echo "<ul class=\"list-table-row\">";
            }
            // line 41
            echo "                        <li class=\"list-table-cell";
            if ((twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "Y-m-d") == twig_date_format_filter($this->env, "today", "Y-m-d"))) {
                echo " today";
            }
            if ((twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "m") != twig_date_format_filter($this->env, (isset($context["current"]) ? $context["current"] : null), "m"))) {
                echo " day-other-month";
            }
            echo "\">
                            <time class=\"day-number\" datetime=\"";
            // line 42
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "Y-m-d H:i"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "d"), "html", null, true);
            echo "</time>
                            ";
            // line 43
            $this->env->loadTemplate("BladeTesterCalendarBundle:Event:group.html.twig")->display(array_merge($context, array("events" => $this->getAttribute((isset($context["events"]) ? $context["events"] : null), "allByDate", array(0 => (isset($context["date"]) ? $context["date"] : null)), "method"))));
            // line 44
            echo "                            <a href=\"";
            echo $this->env->getExtension('routing')->getPath("calendar_event_add");
            echo "?year=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "Y"), "html", null, true);
            echo "&month=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "m"), "html", null, true);
            echo "&day=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "d"), "html", null, true);
            echo "&destination=";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route_params"), "method")), "html", null, true);
            echo "\" class=\"full-link\"></a>
                        </li>
                        ";
            // line 46
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") % 7) == 6)) {
                echo "</ul>";
            }
            // line 47
            echo "                    ";
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
        // line 48
        echo "                </ul>
            </li>
        </ul>
    </section>
";
    }

    // line 54
    public function block_javascripts($context, array $blocks = array())
    {
        // line 55
        echo "    <script type=\"javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("public/js/calendar.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:listByMonth.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 55,  196 => 54,  188 => 48,  174 => 47,  170 => 46,  156 => 44,  154 => 43,  148 => 42,  138 => 41,  133 => 40,  116 => 39,  107 => 35,  101 => 34,  95 => 33,  89 => 32,  83 => 31,  77 => 30,  71 => 29,  64 => 24,  61 => 23,  51 => 15,  47 => 14,  40 => 10,  33 => 5,  30 => 4,);
    }
}
