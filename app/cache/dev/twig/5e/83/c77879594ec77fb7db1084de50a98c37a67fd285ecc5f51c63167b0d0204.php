<?php

/* batimentBundle:Photo:index.json.twig */
class __TwigTemplate_5e83c77879594ec77fb7db1084de50a98c37a67fd285ecc5f51c63167b0d0204 extends Twig_Template
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
        $context["currentIndex"] = 0;
        // line 2
        echo "[";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entitie"]) {
            // line 4
            $context["currentIndex"] = ((isset($context["currentIndex"]) ? $context["currentIndex"] : $this->getContext($context, "currentIndex")) + 1);
            // line 6
            echo twig_jsonencode_filter($this->getAttribute((isset($context["entitie"]) ? $context["entitie"] : $this->getContext($context, "entitie")), "toJson"));
            // line 8
            if (((isset($context["currentIndex"]) ? $context["currentIndex"] : $this->getContext($context, "currentIndex")) < (isset($context["sizeList"]) ? $context["sizeList"] : $this->getContext($context, "sizeList")))) {
                // line 9
                echo ",";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entitie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "]";
    }

    public function getTemplateName()
    {
        return "batimentBundle:Photo:index.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 26,  34 => 11,  23 => 3,  118 => 10,  84 => 47,  110 => 65,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 51,  128 => 53,  107 => 64,  61 => 21,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 53,  119 => 42,  102 => 32,  71 => 25,  67 => 24,  63 => 15,  59 => 14,  87 => 30,  21 => 2,  31 => 8,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 67,  156 => 66,  151 => 63,  142 => 59,  138 => 54,  136 => 56,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 23,  49 => 19,  38 => 7,  26 => 6,  28 => 4,  94 => 28,  89 => 20,  85 => 25,  75 => 17,  68 => 14,  56 => 9,  24 => 3,  25 => 4,  19 => 1,  93 => 53,  88 => 6,  78 => 37,  46 => 10,  44 => 12,  27 => 4,  79 => 18,  72 => 41,  69 => 25,  47 => 9,  40 => 13,  37 => 10,  22 => 1,  246 => 90,  157 => 56,  145 => 46,  139 => 45,  131 => 52,  123 => 11,  120 => 40,  115 => 43,  111 => 37,  108 => 36,  101 => 32,  98 => 31,  96 => 31,  83 => 25,  74 => 36,  66 => 31,  55 => 15,  52 => 18,  50 => 10,  43 => 8,  41 => 15,  35 => 9,  32 => 4,  29 => 6,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 58,  144 => 49,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 41,  112 => 42,  109 => 34,  106 => 36,  103 => 32,  99 => 31,  95 => 54,  92 => 21,  86 => 28,  82 => 22,  80 => 19,  73 => 19,  64 => 24,  60 => 6,  57 => 11,  54 => 10,  51 => 14,  48 => 19,  45 => 9,  42 => 13,  39 => 6,  36 => 6,  33 => 9,  30 => 3,);
    }
}
