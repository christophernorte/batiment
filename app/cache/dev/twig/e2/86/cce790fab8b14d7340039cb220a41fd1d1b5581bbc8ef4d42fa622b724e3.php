<?php

/* batimentBundle:Rubrique:index.html.twig */
class __TwigTemplate_e286cce790fab8b14d7340039cb220a41fd1d1b5581bbc8ef4d42fa622b724e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascript' => array($this, 'block_javascript'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/batiment/js/norte/pictureShowerWidget/css/PictureShower.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 7
    public function block_javascript($context, array $blocks = array())
    {
        // line 8
        echo "
<script>
\tvar dojoConfig = (function(){
\t\tvar base = \"http://\"+window.location.hostname+\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/batiment/js/"), "html", null, true);
        echo "\";
\t\treturn {
\t\t\tasync: true,
\t\t\tisDebug: true,
\t\t\tparseOnLoad:true,
\t\t\tpackages: [{
\t\t\t\t\tname: \"norte\",
\t\t\t\t\tlocation: base + \"norte\"
\t\t\t\t}]
\t\t};
\t})();
\t</script>

\t<script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/batiment/js/dojo/dojo.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>


\t<script>
\t\trequire([\"dojo/dom\", \"dojo/domReady!\",\"norte/PictureShowerWidget\",\"dojo/_base/xhr\"], 
\t\tfunction(dom,domReady,PictureShowerWidget,xhr) {
\t\t\t
\t\t\tvar listRubriqueRequest = xhr.get({
\t\t\t\turl: \"/app_dev.php/galerie/rubriques\",
\t\t\t\thandleAs: \"json\"
\t\t\t});
\t\t
\t\t\tlistRubriqueRequest.then(function(listRubrique){
\t\t\t
\t\t\t\t//Définit les photos par defaut
\t\t\t\txhr.get({
\t\t\t\t\turl: \"/app_dev.php/photo/defaut-photo\",
\t\t\t\t\thandleAs: \"json\",
\t\t\t\t\tload:function(listImageDefaut){
\t\t\t\t\t\t
\t\t\t\t\t\t// Recherche des commentaire associé à la première photo.
\t\t\t\t\t\txhr.get({
\t\t\t\t\t\t\t\turl: \"/app_dev.php/commentaire/\"+listImageDefaut[0].id,
\t\t\t\t\t\t\t\thandleAs: \"json\",
\t\t\t\t\t\t\t\tload:function(listCommentaire){

\t\t\t\t\t\t\t\tvar widget = new PictureShowerWidget({\"listRubrique\":listRubrique,\"listImage\":listImageDefaut,\"listCommentaire\":listCommentaire});

\t\t\t\t\t\t\t\twidget.placeAt(dom.byId('containerPictureWidget'));
\t\t\t\t\t\t\t\twidget.start();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t}
\t\t\t\t});
\t\t\t
\t\t\t});
\t\t});
\t\t</script>
";
    }

    // line 64
    public function block_body($context, array $blocks = array())
    {
        // line 65
        echo "\t\t<div id=\"containerPictureWidget\" >

\t\t</div>
";
    }

    public function getTemplateName()
    {
        return "batimentBundle:Rubrique:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 65,  107 => 64,  64 => 24,  48 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,);
    }
}
