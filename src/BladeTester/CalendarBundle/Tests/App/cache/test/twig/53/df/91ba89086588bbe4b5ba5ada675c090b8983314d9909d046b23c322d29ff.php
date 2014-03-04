<?php

/* BladeTesterCalendarBundle:Calendar:showMini.html.twig */
class __TwigTemplate_53df91ba89086588bbe4b5ba5ada675c090b8983314d9909d046b23c322d29ff extends Twig_Template
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
        echo "<div id=\"mini-calendar\" class=\"dpdiv goog-zippy-expanded goog-zippy-content\">
    <div class=\"dp-monthtablediv monthtableSpace\">
        <table></table>
        <table class=\"dp-monthtable monthtableBody\" summary=\"Minicalendario - marzo de 2013\" cellspacing=\"0\" cellpadding=\"0\" id=\"dp_0_tbl\">
            <tbody>
                <tr class=\"dp-days\">
                    <th scope=\"col\" class=\"dp-cell dp-dayh\" title=\"lunes\">L</th>
                    <th scope=\"col\" class=\"dp-cell dp-dayh\" title=\"martes\">M</th>
                    <th scope=\"col\" class=\"dp-cell dp-dayh\" title=\"miércoles\">X</th>
                    <th scope=\"col\" class=\"dp-cell dp-dayh\" title=\"jueves\">J</th>
                    <th scope=\"col\" class=\"dp-cell dp-dayh\" title=\"viernes\">V</th>
                    <th scope=\"col\" class=\"dp-cell dp-dayh dp-cell dp-weekendh\" title=\"sábado\">S</th>
                    <th scope=\"col\" class=\"dp-cell dp-dayh dp-cell dp-weekendh\" title=\"domingo\">D</th>
                </tr>
                ";
        // line 15
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
        foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
            // line 16
            echo "                    ";
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") % 7) == 0)) {
                echo "<tr>";
            }
            // line 17
            echo "                        <td class=\"day";
            if ((twig_date_format_filter($this->env, (isset($context["day"]) ? $context["day"] : null), "Y-m-d") == twig_date_format_filter($this->env, "today", "Y-m-d"))) {
                echo " today";
            }
            if ((twig_date_format_filter($this->env, (isset($context["day"]) ? $context["day"] : null), "m") != twig_date_format_filter($this->env, "today", "m"))) {
                echo " offmonth";
            }
            echo "\">
                            <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_event_list_by_day", array("year" => twig_date_format_filter($this->env, (isset($context["day"]) ? $context["day"] : null), "Y"), "month" => twig_date_format_filter($this->env, (isset($context["day"]) ? $context["day"] : null), "m"), "day" => twig_date_format_filter($this->env, (isset($context["day"]) ? $context["day"] : null), "d"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["day"]) ? $context["day"] : null), "d"), "html", null, true);
            echo "</a>
                        </td>
                    ";
            // line 20
            if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0") % 7) == 6)) {
                echo "</tr>";
            }
            // line 21
            echo "                ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "            </tbody>
        </table>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Calendar:showMini.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 22,  78 => 21,  74 => 20,  67 => 18,  57 => 17,  52 => 16,  35 => 15,  19 => 1,);
    }
}
