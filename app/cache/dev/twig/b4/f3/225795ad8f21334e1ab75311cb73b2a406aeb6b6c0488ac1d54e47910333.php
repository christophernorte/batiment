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
        return array (  128 => 53,  123 => 11,  118 => 10,  95 => 54,  93 => 53,  84 => 47,  78 => 44,  72 => 41,  41 => 12,  38 => 11,  36 => 10,  32 => 9,  22 => 1,  110 => 65,  107 => 64,  64 => 24,  48 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
