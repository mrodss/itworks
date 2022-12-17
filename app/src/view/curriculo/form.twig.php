{% extends 'partials/template.twig.php' %}

{%block title%} Job Aplication | CADASTRO DE CURRÍCULO {% endblock %}

{% block body %}
<div class="row">
    <div class="col-md-6">
        <form action="/form-salvar" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="firstname" aria-describedby="firstnameHelp">
                <p id="nomeHelp" class="form-text">Digite seu nome:</p>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Formulário</button>
        </form>
    </div>

    <div class="col-md-6">
        <p>BRASIl</p>
    </div>
</div>

{% endblock %}