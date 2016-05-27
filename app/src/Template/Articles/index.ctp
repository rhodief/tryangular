
<h3>Index</h3>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Identificação</th>
            <th>idade</th>
            <th>Gênero</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="(k, v) in articles.articles">

            <td>#{{k+1}}</td>
            <td>{{v.title}}</td>
            <td>{{v.created}}</td>
            <td>{{v.modified}}</td>
            <td><a href="#/teor/{{v.id}}"  tb-btn="primary">Detalhes</a> | <a href="#/editar/{{v.id}}" tb-btn="primary">Editar</a> | <a href=""ng-click="remover(v.id)"  tb-btn="danger">Apagar</a></td>
        </tr>
    </tbody>
</table>

<a href="#/novo-artigo">Novo</a>