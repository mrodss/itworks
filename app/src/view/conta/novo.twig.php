{% extends 'partials/template.twig.php' %}
{%block title%} NOVO REGISTRO {% endblock %}

{% block body %}
<h1>Novo Registro</h1>
<form action="{{BASE}}conta-salvar" method="post">

    <div class="mt-3">
        <label for="txtValor" class="form-label">Valor</label>
        <input type="text" id="txtValor" name="txtValor" class="form-control" placeholder="Valor" required />
    </div>

    <div class="mt-3">
        <label for="selMovimentacao" class="form-label">Movimentação</label>
        <select id="selMovimentacao" name="selMovimentacao" class="form-control">
            <option value="">Selecione</option>
            <option value="DEBITO">DEBITO</option>
            <option value="CREDITO">CREDITO</option>
        </select>
    </div>

    <div class="mt-3 text-rigth">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>

{% endblock %}