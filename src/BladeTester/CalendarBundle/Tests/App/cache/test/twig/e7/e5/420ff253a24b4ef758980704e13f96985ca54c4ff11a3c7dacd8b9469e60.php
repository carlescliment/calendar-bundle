<?php

/* BladeTesterCalendarBundle:Category:add.html.twig */
class __TwigTemplate_e7e5420ff253a24b4ef758980704e13f96985ca54c4ff11a3c7dacd8b9469e60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BladeTesterCalendarBundle:Base:base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
        echo "<h1>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.title.category.add"), "html", null, true);
        echo "</h1>

<form id=\"category-add\" method=\"POST\" action=\"";
        // line 6
        echo $this->env->getExtension('routing')->getUrl("calendar_category_add");
        echo "?destination=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "get", array(0 => "destination"), "method"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
    <ul>
        <li>
            ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name"), 'label');
        echo "
            ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name"), 'errors');
        echo "
            ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "name"), 'widget');
        echo "
        </li>
        <li>
            <ul class=\"calendar-colors\">
                ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["colors"]) ? $context["colors"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
            // line 16
            echo "                    <li id=\"";
            echo twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true);
            echo "\" class=\"calendar-color event-color-";
            echo twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true);
            if (($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "color") == (isset($context["color"]) ? $context["color"] : null))) {
                echo " active";
            }
            echo "\"></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "            </ul>
        </li>
        <li style=\"display:none\">
            ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "color"), 'label');
        echo "
            ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "color"), 'errors');
        echo "
            ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "color"), 'widget');
        echo "
        </li>
    </ul>
    ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
    <input type=\"submit\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("bladetester_calendar.label.category.add"), "html", null, true);
        echo "\" />
</form>
";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Category:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 27,  99 => 26,  93 => 23,  89 => 22,  85 => 21,  80 => 18,  66 => 16,  62 => 15,  55 => 11,  51 => 10,  47 => 9,  37 => 6,  31 => 4,  28 => 3,);
    }
}
