{% extends 'partials/template.twig.php' %}

{%block title%} {{titulo}} {% endblock %}

{%block body%}
<div class="max-width centerscreen bg-white padding mt-5">
    <h1>
        {{titulo}}
    </h1>
    <hr />
    <p>{{descricao}}</p>

    {% if link != null %}
    <a herf="{{link}}" class="btn btn-info"> Voltar</a>
    {%endif}

</div>

{%endblock}