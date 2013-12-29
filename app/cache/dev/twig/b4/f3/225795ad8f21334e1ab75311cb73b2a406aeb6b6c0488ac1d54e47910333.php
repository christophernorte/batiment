<?php

/* ::base.html.twig */
class __TwigTemplate_b4f3225795ad8f21334e1ab75311cb73b2a406aeb6b6c0488ac1d54e47910333 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" dir=\"ltr\" lang=\"en-US\" xml:lang=\"en\">
    <head>
        <meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\" />
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE7\" />
        <title>Francois norte</title>

        <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/batiment/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascript', $context, $blocks);
        // line 12
        echo "        <!--[if IE 6]><link rel=\"stylesheet\" href=\"style.ie6.css\" type=\"text/css\" media=\"screen\" /><![endif]-->
        <!--[if IE 7]><link rel=\"stylesheet\" href=\"style.ie7.css\" type=\"text/css\" media=\"screen\" /><![endif]-->
    </head>
    <body class=\"tundra\">
        <div id=\"art-main\">
        <div class=\"art-sheet\">
            <div class=\"art-sheet-tl\"></div>
            <div class=\"art-sheet-tr\"></div>
            <div class=\"art-sheet-bl\"></div>
            <div class=\"art-sheet-br\"></div>
            <div class=\"art-sheet-tc\"></div>
            <div class=\"art-sheet-bc\"></div>
            <div class=\"art-sheet-cl\"></div>
            <div class=\"art-sheet-cr\"></div>
            <div class=\"art-sheet-cc\"></div>
            <div class=\"art-sheet-body\">
                <div class=\"art-header\">
                    <div class=\"art-header-png\"></div>
                    <div class=\"art-header-jpeg\"></div>
                    <div class=\"art-logo\">
                        <h1 id=\"name-text\" class=\"art-logo-name\"><a href=\"#\">Francois Norte</a></h1>
                            <div id=\"slogan-text\" class=\"art-logo-text\">Restauration du patrimoine</div>
                        </div>
                    </div>
                    <div class=\"art-nav\">
                        <div class=\"l\"></div>
                        <div class=\"r\"></div>
                        <ul class=\"art-menu\">
                            <li>
                                <a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("presentation");
        echo "\" class=\"{ActiveItem}\"><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">Accueil</span></a>
                            </li>
                            <li>
                                <a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("contact");
        echo "\" class=\"{ActiveItem}\"><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">Contact</span></a>
                            </li>
                            <li>
                                <a href=\"";
        // line 47
        echo $this->env->getExtension('routing')->getPath("galerie");
        echo "\"><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">Galerie Photo</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class=\"art-content-layout\">
                        <div id=\"art-content\">
                            ";
        // line 53
        $this->displayBlock('body', $context, $blocks);
        // line 54
        echo "                        </div>
                    </div>
                    <div class=\"cleared\"></div><div class=\"art-footer\">
                        <div class=\"art-footer-inner\">
                            <div class=\"art-footer-text\">
                                <p><a href=\"javascript:goNav('contact.html')\">Me Contacter</a> | <a href=\"#\">Terms of Use</a> | <a href=\"#\">Trademarks</a>
                                    | <a href=\"#\">Privacy Statement</a><br />
                                    Copyright &copy; 2010 . All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class=\"art-footer-background\"></div>
                    </div>
                    <div class=\"cleared\"></div>
                </div>
            </div>
            <div class=\"cleared\"></div>
            <p class=\"art-page-footer\"><a href=\"http://www.artisteer.com/\">Web Template</a> created with Artisteer.</p>
        </div>
    </body>
</html>";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 11
    public function block_javascript($context, array $blocks = array())
    {
    }

    // line 53
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 10,  84 => 47,  110 => 65,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 53,  107 => 64,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 17,  67 => 15,  63 => 15,  59 => 14,  87 => 25,  21 => 2,  31 => 5,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  38 => 11,  26 => 6,  28 => 3,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 14,  56 => 9,  24 => 4,  25 => 4,  19 => 1,  93 => 53,  88 => 6,  78 => 44,  46 => 7,  44 => 12,  27 => 4,  79 => 18,  72 => 41,  69 => 25,  47 => 9,  40 => 7,  37 => 10,  22 => 1,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 11,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 14,  66 => 15,  55 => 15,  52 => 21,  50 => 10,  43 => 8,  41 => 12,  35 => 5,  32 => 9,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 36,  103 => 32,  99 => 31,  95 => 54,  92 => 21,  86 => 28,  82 => 22,  80 => 19,  73 => 19,  64 => 24,  60 => 6,  57 => 11,  54 => 10,  51 => 14,  48 => 11,  45 => 17,  42 => 7,  39 => 9,  36 => 10,  33 => 4,  30 => 3,);
    }
}
