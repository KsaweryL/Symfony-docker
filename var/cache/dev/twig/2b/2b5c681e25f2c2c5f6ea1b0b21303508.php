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

/* user/button/btn.html.twig */
class __TwigTemplate_48b167154de2cf8be23d6dcb57cd32c9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/button/btn.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/button/btn.html.twig"));

        // line 1
        echo "<html>
<head>
    <meta charset=\"UTF-8\">
    <title></title>
    <!--<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/water.css@2/out/water.css\">-->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/scss/main.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">
</head>
<body>
<main>
    ";
        // line 12
        echo "    ";
        $context["info_y_position"] = 80;
        // line 13
        echo "    ";
        if (((isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 13, $this->source); })()) != "")) {
            // line 14
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 14, $this->source); })()), "html", null, true);
            echo "\" class=\"btn btn-info\" role=\"button\" style = \"position:absolute; left:80px; top:20px;\">
            ";
            // line 15
            echo twig_escape_filter($this->env, (isset($context["text"]) || array_key_exists("text", $context) ? $context["text"] : (function () { throw new RuntimeError('Variable "text" does not exist.', 15, $this->source); })()), "html", null, true);
            echo "
        </a>
    ";
        }
        // line 18
        echo "
    <br>
    <br>
    ";
        // line 21
        if (((isset($context["url2"]) || array_key_exists("url2", $context) ? $context["url2"] : (function () { throw new RuntimeError('Variable "url2" does not exist.', 21, $this->source); })()) != "")) {
            // line 22
            echo "        ";
            $context["info_y_position"] = 140;
            // line 23
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["url2"]) || array_key_exists("url2", $context) ? $context["url2"] : (function () { throw new RuntimeError('Variable "url2" does not exist.', 23, $this->source); })()), "html", null, true);
            echo "\" class=\"btn btn-info\" role=\"button\" style = \"position:absolute; left:80px; top:80px;\">
            ";
            // line 24
            echo twig_escape_filter($this->env, (isset($context["text2"]) || array_key_exists("text2", $context) ? $context["text2"] : (function () { throw new RuntimeError('Variable "text2" does not exist.', 24, $this->source); })()), "html", null, true);
            echo "
        </a>
    ";
        }
        // line 27
        echo "
    <br>
    <br>
    ";
        // line 30
        if (((isset($context["url3"]) || array_key_exists("url3", $context) ? $context["url3"] : (function () { throw new RuntimeError('Variable "url3" does not exist.', 30, $this->source); })()) != "")) {
            // line 31
            echo "        ";
            $context["info_y_position"] = 200;
            // line 32
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["url3"]) || array_key_exists("url3", $context) ? $context["url3"] : (function () { throw new RuntimeError('Variable "url3" does not exist.', 32, $this->source); })()), "html", null, true);
            echo "\" class=\"btn btn-info\" role=\"button\" style = \"position:absolute; left:80px; top:140px;\">
                ";
            // line 33
            echo twig_escape_filter($this->env, (isset($context["text3"]) || array_key_exists("text3", $context) ? $context["text3"] : (function () { throw new RuntimeError('Variable "text3" does not exist.', 33, $this->source); })()), "html", null, true);
            echo "
        </a>
    ";
        }
        // line 36
        echo "
    <br>
    <br>
    ";
        // line 39
        if (((isset($context["url4"]) || array_key_exists("url4", $context) ? $context["url4"] : (function () { throw new RuntimeError('Variable "url4" does not exist.', 39, $this->source); })()) != "")) {
            // line 40
            echo "        ";
            $context["info_y_position"] = 260;
            // line 41
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["url4"]) || array_key_exists("url4", $context) ? $context["url4"] : (function () { throw new RuntimeError('Variable "url4" does not exist.', 41, $this->source); })()), "html", null, true);
            echo "\" class=\"btn btn-info\" role=\"button\" style = \"position:absolute; left:80px; top:200px;\">
            ";
            // line 42
            echo twig_escape_filter($this->env, (isset($context["text4"]) || array_key_exists("text4", $context) ? $context["text4"] : (function () { throw new RuntimeError('Variable "text4" does not exist.', 42, $this->source); })()), "html", null, true);
            echo "
        </a>
    ";
        }
        // line 45
        echo "
    ";
        // line 46
        if (((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 46, $this->source); })()) != "")) {
            // line 47
            echo "        <p style = \"position:absolute; left:80px; top:";
            echo twig_escape_filter($this->env, (isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 47, $this->source); })()), "html", null, true);
            echo "px;\">
        <p style=\"position:absolute; left:80px; top:";
            // line 48
            echo twig_escape_filter($this->env, (isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 48, $this->source); })()), "html", null, true);
            echo "px;\"><strong>Information about the user:</strong></p>
            <div>
                 <p style = \"position:absolute; left:80px; top:";
            // line 50
            echo twig_escape_filter($this->env, ((isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 50, $this->source); })()) + 30), "html", null, true);
            echo "px;\">
                     Name: ";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 51, $this->source); })()), "name", [], "any", false, false, false, 51), "html", null, true);
            echo "
                 </p>
                <p style = \"position:absolute; left:80px; top:";
            // line 53
            echo twig_escape_filter($this->env, ((isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 53, $this->source); })()) + 60), "html", null, true);
            echo "px;\">
                    Surname: ";
            // line 54
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 54, $this->source); })()), "surname", [], "any", false, false, false, 54), "html", null, true);
            echo "
                </p>
                <p style = \"position:absolute; left:80px; top:";
            // line 56
            echo twig_escape_filter($this->env, ((isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 56, $this->source); })()) + 90), "html", null, true);
            echo "px;\">
            Age: ";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 57, $this->source); })()), "age", [], "any", false, false, false, 57), "html", null, true);
            echo "
                </p>
                <p style = \"position:absolute; left:80px; top:";
            // line 59
            echo twig_escape_filter($this->env, ((isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 59, $this->source); })()) + 120), "html", null, true);
            echo "px;\">
                    Email: ";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 60, $this->source); })()), "email", [], "any", false, false, false, 60), "html", null, true);
            echo "
                </p>
                <p style = \"position:absolute; left:80px; top:";
            // line 62
            echo twig_escape_filter($this->env, ((isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 62, $this->source); })()) + 150), "html", null, true);
            echo "px;\">
                    Checkbox: ";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 63, $this->source); })()), "checkbox", [], "any", false, false, false, 63), "html", null, true);
            echo "
                </p>
                <p style = \"position:absolute; left:80px; top:";
            // line 65
            echo twig_escape_filter($this->env, ((isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 65, $this->source); })()) + 180), "html", null, true);
            echo "px;\">
                    Task: ";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 66, $this->source); })()), "task", [], "any", false, false, false, 66), "html", null, true);
            echo "
                </p>
                <p style = \"position:absolute; left:80px; top:";
            // line 68
            echo twig_escape_filter($this->env, ((isset($context["info_y_position"]) || array_key_exists("info_y_position", $context) ? $context["info_y_position"] : (function () { throw new RuntimeError('Variable "info_y_position" does not exist.', 68, $this->source); })()) + 210), "html", null, true);
            echo "px;\">
                    Due date: ";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["userDueDate"]) || array_key_exists("userDueDate", $context) ? $context["userDueDate"] : (function () { throw new RuntimeError('Variable "userDueDate" does not exist.', 69, $this->source); })()), "html", null, true);
            echo "
                </p>
            </div>
        </p>
    ";
        }
        // line 74
        echo "</main>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "user/button/btn.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 74,  208 => 69,  204 => 68,  199 => 66,  195 => 65,  190 => 63,  186 => 62,  181 => 60,  177 => 59,  172 => 57,  168 => 56,  163 => 54,  159 => 53,  154 => 51,  150 => 50,  145 => 48,  140 => 47,  138 => 46,  135 => 45,  129 => 42,  124 => 41,  121 => 40,  119 => 39,  114 => 36,  108 => 33,  103 => 32,  100 => 31,  98 => 30,  93 => 27,  87 => 24,  82 => 23,  79 => 22,  77 => 21,  72 => 18,  66 => 15,  61 => 14,  58 => 13,  55 => 12,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
<head>
    <meta charset=\"UTF-8\">
    <title></title>
    <!--<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/water.css@2/out/water.css\">-->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/scss/main.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">
</head>
<body>
<main>
    {# defining position of the user's information panel #}
    {% set info_y_position = 80 %}
    {% if url != \"\" %}
        <a href=\"{{ url }}\" class=\"btn btn-info\" role=\"button\" style = \"position:absolute; left:80px; top:20px;\">
            {{ text }}
        </a>
    {% endif %}

    <br>
    <br>
    {% if url2 != \"\" %}
        {% set info_y_position = 140 %}
        <a href=\"{{ url2 }}\" class=\"btn btn-info\" role=\"button\" style = \"position:absolute; left:80px; top:80px;\">
            {{ text2 }}
        </a>
    {% endif %}

    <br>
    <br>
    {% if url3 != \"\" %}
        {% set info_y_position = 200 %}
        <a href=\"{{ url3 }}\" class=\"btn btn-info\" role=\"button\" style = \"position:absolute; left:80px; top:140px;\">
                {{ text3 }}
        </a>
    {% endif %}

    <br>
    <br>
    {% if url4 != \"\" %}
        {% set info_y_position = 260 %}
        <a href=\"{{ url4 }}\" class=\"btn btn-info\" role=\"button\" style = \"position:absolute; left:80px; top:200px;\">
            {{ text4 }}
        </a>
    {% endif %}

    {% if user != \"\" %}
        <p style = \"position:absolute; left:80px; top:{{ info_y_position }}px;\">
        <p style=\"position:absolute; left:80px; top:{{ info_y_position }}px;\"><strong>Information about the user:</strong></p>
            <div>
                 <p style = \"position:absolute; left:80px; top:{{ info_y_position +30 }}px;\">
                     Name: {{ user.name }}
                 </p>
                <p style = \"position:absolute; left:80px; top:{{ info_y_position +60 }}px;\">
                    Surname: {{ user.surname }}
                </p>
                <p style = \"position:absolute; left:80px; top:{{ info_y_position +90 }}px;\">
            Age: {{ user.age }}
                </p>
                <p style = \"position:absolute; left:80px; top:{{ info_y_position +120 }}px;\">
                    Email: {{ user.email }}
                </p>
                <p style = \"position:absolute; left:80px; top:{{ info_y_position +150 }}px;\">
                    Checkbox: {{ user.checkbox }}
                </p>
                <p style = \"position:absolute; left:80px; top:{{ info_y_position +180 }}px;\">
                    Task: {{ user.task }}
                </p>
                <p style = \"position:absolute; left:80px; top:{{ info_y_position +210 }}px;\">
                    Due date: {{ userDueDate}}
                </p>
            </div>
        </p>
    {% endif %}
</main>
</body>
</html>", "user/button/btn.html.twig", "/var/www/project/templates/user/button/btn.html.twig");
    }
}
