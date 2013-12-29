<?php

/* batimentBundle:Commentaire:index.html.twig */
class __TwigTemplate_f8ef98162ed45edea8b603a87dcbeb0e622862c24233ddd181af4d2632c4d116 extends Twig_Template
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
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 4
            echo "\t";
            $context["currentIndex"] = ((isset($context["currentIndex"]) ? $context["currentIndex"] : $this->getContext($context, "currentIndex")) + 1);
            // line 6
            echo twig_jsonencode_filter($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "toJson"));
            // line 8
            if (((isset($context["currentIndex"]) ? $context["currentIndex"] : $this->getContext($context, "currentIndex")) < (isset($context["sizeList"]) ? $context["sizeList"] : $this->getContext($context, "sizeList")))) {
                // line 9
                echo ",";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "]";
    }

    public function getTemplateName()
    {
        return "batimentBundle:Commentaire:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 13,  35 => 9,  33 => 8,  31 => 6,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
