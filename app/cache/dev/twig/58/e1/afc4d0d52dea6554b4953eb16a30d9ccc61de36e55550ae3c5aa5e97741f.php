<?php

/* batimentBundle:Photo:default.json.twig */
class __TwigTemplate_58e1afc4d0d52dea6554b4953eb16a30d9ccc61de36e55550ae3c5aa5e97741f extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable((isset($context["defautPhotos"]) ? $context["defautPhotos"] : $this->getContext($context, "defautPhotos")));
        foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
            // line 4
            $context["currentIndex"] = ((isset($context["currentIndex"]) ? $context["currentIndex"] : $this->getContext($context, "currentIndex")) + 1);
            // line 5
            echo twig_jsonencode_filter($this->getAttribute((isset($context["photo"]) ? $context["photo"] : $this->getContext($context, "photo")), "toJson"));
            // line 6
            if (((isset($context["currentIndex"]) ? $context["currentIndex"] : $this->getContext($context, "currentIndex")) < (isset($context["sizeList"]) ? $context["sizeList"] : $this->getContext($context, "sizeList")))) {
                // line 7
                echo ",";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "]";
    }

    public function getTemplateName()
    {
        return "batimentBundle:Photo:default.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 10,  33 => 7,  31 => 6,  29 => 5,  27 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
