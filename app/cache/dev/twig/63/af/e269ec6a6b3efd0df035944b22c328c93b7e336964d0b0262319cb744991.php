<?php

/* batimentBundle:Rubrique:index.json.twig */
class __TwigTemplate_63afe269ec6a6b3efd0df035944b22c328c93b7e336964d0b0262319cb744991 extends Twig_Template
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
        echo "[
";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entitie"]) {
            // line 4
            echo "\t";
            $context["currentIndex"] = ((isset($context["currentIndex"]) ? $context["currentIndex"] : $this->getContext($context, "currentIndex")) + 1);
            // line 5
            echo "       ";
            echo twig_jsonencode_filter($this->getAttribute((isset($context["entitie"]) ? $context["entitie"] : $this->getContext($context, "entitie")), "toJson"));
            echo "
\t";
            // line 6
            if (((isset($context["currentIndex"]) ? $context["currentIndex"] : $this->getContext($context, "currentIndex")) < (isset($context["sizeList"]) ? $context["sizeList"] : $this->getContext($context, "sizeList")))) {
                // line 7
                echo "\t\t,
\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entitie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "]";
    }

    public function getTemplateName()
    {
        return "batimentBundle:Rubrique:index.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 10,  38 => 7,  36 => 6,  31 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
