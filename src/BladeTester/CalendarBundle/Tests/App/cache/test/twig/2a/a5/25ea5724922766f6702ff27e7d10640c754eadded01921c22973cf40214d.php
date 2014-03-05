<?php

/* BladeTesterCalendarBundle:Base:base.html.twig */
class __TwigTemplate_2aa525ea5724922766f6702ff27e7d10640c754eadded01921c22973cf40214d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head>
        <link rel=\"stylesheet\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bladetestercalendar/css/calendar-header.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bladetestercalendar/css/calendar.css"), "html", null, true);
        echo "\">
    </head>
    <body>
            <div class=\"app\">
                <header class=\"main-header\">
                    ";
        // line 9
        $this->displayBlock('header', $context, $blocks);
        // line 11
        echo "                </header>


                <div class=\"main-body\">
                    ";
        // line 15
        $this->displayBlock('body', $context, $blocks);
        // line 17
        echo "                </div>

                <footer class=\"main-footer\">
                    ";
        // line 20
        $this->displayBlock('footer', $context, $blocks);
        // line 23
        echo "                </footer>
            </div>

    ";
        // line 26
        $this->displayBlock('javascripts', $context, $blocks);
        // line 30
        echo "    </body>
</html>

";
    }

    // line 9
    public function block_header($context, array $blocks = array())
    {
        // line 10
        echo "                    ";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 16
        echo "                    ";
    }

    // line 20
    public function block_footer($context, array $blocks = array())
    {
        // line 21
        echo "                        <p>Opensourced by <a href=\"#\">&reg;Vetaminic</a></p>
                    ";
    }

    // line 26
    public function block_javascripts($context, array $blocks = array())
    {
        // line 27
        echo "        <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bladetestercalendar/js/jquery-1.9.1.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bladetestercalendar/js/calendar.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "BladeTesterCalendarBundle:Base:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 28,  95 => 27,  92 => 26,  87 => 21,  84 => 20,  77 => 15,  73 => 10,  70 => 9,  63 => 30,  61 => 26,  56 => 23,  54 => 20,  49 => 17,  41 => 11,  39 => 9,  27 => 3,  23 => 1,  103 => 27,  99 => 26,  93 => 23,  89 => 22,  85 => 21,  80 => 16,  66 => 16,  62 => 15,  55 => 11,  51 => 10,  47 => 15,  37 => 6,  31 => 4,  28 => 3,);
    }
}
