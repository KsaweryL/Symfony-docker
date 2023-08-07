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

/* user_data_sql/form.html.twig */
class __TwigTemplate_fd42323e96baad73fe558c2868844238 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_data_sql/form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_data_sql/form.html.twig"));

        // line 2
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'form_start');
        echo "
<html>
<head>
    <meta charset=\"UTF-8\">
    <title></title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/scss/form.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/water.css@2/out/water.css\">
</head>
<style>

</style>
<body>
    <div class=\"my-custom-class-for-errors\">
        ";
        // line 15
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), 'errors');
        echo "
    </div>

    <div class=\"form-control\">
        ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), 'label');
        echo "
        ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), 'widget');
        echo "

        <small>";
        // line 22
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 22, $this->source); })()), 'help');
        echo "</small>

        <div class=\"form-error\">
            ";
        // line 25
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), 'errors');
        echo "
        </div>
    </div>

    ";
        // line 29
        if (((isset($context["signup"]) || array_key_exists("signup", $context) ? $context["signup"] : (function () { throw new RuntimeError('Variable "signup" does not exist.', 29, $this->source); })()) == 1)) {
            // line 30
            echo "        ";
            if ((twig_length_filter($this->env, (isset($context["password"]) || array_key_exists("password", $context) ? $context["password"] : (function () { throw new RuntimeError('Variable "password" does not exist.', 30, $this->source); })())) < 3)) {
                // line 31
                echo "            <p class=\"password_error\">The password must be at least 3 characters long<br></p>
        ";
            }
            // line 33
            echo "            ";
            if ((twig_length_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 33, $this->source); })())) < 3)) {
                // line 34
                echo "                <p class=\"name_error\">Name must be at least 3 characters long</p>
            ";
            }
            // line 36
            echo "    ";
        }
        // line 37
        echo "</body>
</html>
";
        // line 39
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), 'form_end');
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "user_data_sql/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 39,  107 => 37,  104 => 36,  100 => 34,  97 => 33,  93 => 31,  90 => 30,  88 => 29,  81 => 25,  75 => 22,  70 => 20,  66 => 19,  59 => 15,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# templates/task/new.html.twig #}
{{ form_start(form) }}
<html>
<head>
    <meta charset=\"UTF-8\">
    <title></title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/scss/form.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/water.css@2/out/water.css\">
</head>
<style>

</style>
<body>
    <div class=\"my-custom-class-for-errors\">
        {{ form_errors(form) }}
    </div>

    <div class=\"form-control\">
        {{ form_label(form) }}
        {{ form_widget(form) }}

        <small>{{ form_help(form) }}</small>

        <div class=\"form-error\">
            {{ form_errors(form) }}
        </div>
    </div>

    {% if signup == 1 %}
        {% if  password|length <3  %}
            <p class=\"password_error\">The password must be at least 3 characters long<br></p>
        {% endif %}
            {% if  name|length <3  %}
                <p class=\"name_error\">Name must be at least 3 characters long</p>
            {% endif %}
    {% endif %}
</body>
</html>
{{ form_end(form) }}", "user_data_sql/form.html.twig", "/var/www/project/templates/user_data_sql/form.html.twig");
    }
}
