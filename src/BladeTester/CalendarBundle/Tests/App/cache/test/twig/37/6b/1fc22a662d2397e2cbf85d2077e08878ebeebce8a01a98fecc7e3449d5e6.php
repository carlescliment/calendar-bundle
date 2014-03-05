<?php

/* BladeTesterCalendarBundle:Event:list.html.twig */
class __TwigTemplate_376b1fc22a662d2397e2cbf85d2077e08878ebeebce8a01a98fecc7e3449d5e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BladeTesterCalendarBundle:Event:base.html.twig");

        $this->blocks = array(
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
    public function block_calendar_body($context, array $blocks = array())
    {
        // line 4
        echo "    <section class=\"schedule-content schedule-view-schedule\">
    ";
        // line 5
        if (($this->getAttribute((isset($context["events"]) ? $context["events"] : null), "count") > 0)) {
            // line 6
            echo "        <ul class=\"list-schedule-events\">
            ";
            // line 7
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["events"]) ? $context["events"] : null), "dates"));
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
                // line 8
                echo "                <li class=\"day\">
                    <h2 class=\"day-day\"><a href=\"";
                // line 9
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_day", array("year" => twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "Y"), "month" => twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "m"), "day" => twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "d"))), "html", null, true);
                echo "\"><time datetime=\"";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "Y-m-d H:i"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "l")), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "d"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "F")), "html", null, true);
                echo "</time></a></h2>
                    <ul class=\"schedule-group-appointments\">
                        ";
                // line 11
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["events"]) ? $context["events"] : null), "allByDate", array(0 => (isset($context["date"]) ? $context["date"] : null)), "method"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                    // line 12
                    echo "                            ";
                    $this->env->loadTemplate("BladeTesterCalendarBundle:Event:listItem.html.twig")->display(array_merge($context, array("event" => (isset($context["event"]) ? $context["event"] : null))));
                    // line 13
                    echo "                        ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 14
                echo "                    </ul>
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
            // line 17
            echo "        </ul>
    ";
        } else {
            // line 19
            echo "        <p>
            ";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.list.no_events"), "html", null, true);
            echo "
        </p>
    ";
        }
        // line 23
        echo "    </section>
";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Event:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 23,  129 => 20,  126 => 19,  122 => 17,  106 => 14,  92 => 13,  89 => 12,  72 => 11,  59 => 9,  56 => 8,  39 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
