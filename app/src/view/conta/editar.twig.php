{% extends 'partials/template.twig.php' %}
{%block title%} Editar REGISTRO {% endblock %}

{% block body %}
<h1>Editar Registro</h1>
<form action="{{BASE}}conta-atualizar" method="post">
    <input type="hidden" name="id" valeu="{{conta.id}}">
    <div class="mt-3">
        <label for="txtValor" class="form-label">Valor</label>
        <input value="{{conta.valor}}" type="text" id="txtValor" name="txtValor" class="form-control" placeholder="Valor" required />
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