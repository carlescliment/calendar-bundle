<?php

/* BladeTesterCalendarBundle:Category:list.html.twig */
class __TwigTemplate_067cfe5b183bc263703df5d3acbccc052ba13d1ab80bf0bdcfc7250ef5641d3a extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.title.category.list"), "html", null, true);
        echo "</h2>

";
        // line 3
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 4
            echo "    <ul>
        ";
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 6
                echo "            <li class=\"event-category event-color-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "color"), "html", null, true);
                echo "\">
                <a href=\"";
                // line 7
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_category_edit", array("id" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true);
                echo "</a>
                (<a class=\"alert\" href=\"";
                // line 8
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calendar_category_delete", array("id" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"))), "html", null, true);
                echo "\" onclick=\"return confirm('";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.event_category.delete_warning"), "html", null, true);
                echo "');\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.category.delete"), "html", null, true);
                echo "</a>)
            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "    </ul>
";
        } else {
            // line 13
            echo "    <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.list.no_categories"), "html", null, true);
            echo "</p>
";
        }
        // line 15
        echo "
<a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("calendar_category_add");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.category.add"), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Category:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 16,  68 => 15,  62 => 13,  45 => 8,  39 => 7,  34 => 6,  30 => 5,  27 => 4,  25 => 3,  19 => 1,  58 => 11,  54 => 12,  48 => 11,  44 => 10,  40 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
