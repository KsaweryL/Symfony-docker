<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* user/userData.html.twig */
class __TwigTemplate_4e74823c9d957ebaff10b5e76afd431e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/userData.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/userData.html.twig"));

        // line 2
        echo "<html>
<head>
    <meta charset=\"UTF-8\">
    <title></title>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/water.css@2/out/water.css\">
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: \"Lato\", sans-serif;}
        body, html {
            height: 100%;
            color: #777;
            line-height: 1.8;
        }
     </style>
        </head>
<body>


<p>Name: ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["userData"]) || array_key_exists("userData", $context) ? $context["userData"] : (function () { throw new RuntimeError('Variable "userData" does not exist.', 19, $this->source); })()), "name", [], "any", false, false, false, 19), "html", null, true);
        echo "</p>
<p>Surname: ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["userData"]) || array_key_exists("userData", $context) ? $context["userData"] : (function () { throw new RuntimeError('Variable "userData" does not exist.', 20, $this->source); })()), "surname", [], "any", false, false, false, 20), "html", null, true);
        echo "</p>
<p>Age: ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["userData"]) || array_key_exists("userData", $context) ? $context["userData"] : (function () { throw new RuntimeError('Variable "userData" does not exist.', 21, $this->source); })()), "age", [], "any", false, false, false, 21), "html", null, true);
        echo "</p>
";
        // line 22
        if (twig_get_attribute($this->env, $this->source, (isset($context["userData"]) || array_key_exists("userData", $context) ? $context["userData"] : (function () { throw new RuntimeError('Variable "userData" does not exist.', 22, $this->source); })()), "checkbox", [], "any", false, false, false, 22)) {
            // line 23
            echo "    <p>Checkbox was ticked</p>
";
        } else {
            // line 25
            echo "    <p>Checkbox wasn't ticked</p>
";
        }
        // line 27
        echo "
</body>
</html>

";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "user/userData.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 27,  80 => 25,  76 => 23,  74 => 22,  70 => 21,  66 => 20,  62 => 19,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# templates/user/userData.html.twig #}
<html>
<head>
    <meta charset=\"UTF-8\">
    <title></title>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/water.css@2/out/water.css\">
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: \"Lato\", sans-serif;}
        body, html {
            height: 100%;
            color: #777;
            line-height: 1.8;
        }
     </style>
        </head>
<body>


<p>Name: {{ userData.name }}</p>
<p>Surname: {{ userData.surname }}</p>
<p>Age: {{ userData.age }}</p>
{% if userData.checkbox %}
    <p>Checkbox was ticked</p>
{% else %}
    <p>Checkbox wasn't ticked</p>
{% endif %}

</body>
</html>

", "user/userData.html.twig", "/var/www/project/templates/user/userData.html.twig");
    }
}
