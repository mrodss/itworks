{% extends 'partials/template.twig.php' %}

{%block title%} Job Aplication | eNVIAR aRQUIVO {% endblock %}

{% block body %}
<form action="/arquivo-salvar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{id}}" />
    <div class="mb-3">
        <label for="arquivo" class="form-label">Curriculo em Arquivo:</label>
        <input type="file" class="form-control" name="curriculo" id="arquivo" aria-describedby="arquivoHelp">
        <p id="arquivoHelp" class="form-text">Envie seu curriculo:</p>
    </div>
    <button type="submit" class="btn btn-primary">Enviar Curriculo</button>
</form>
{% endblock %}