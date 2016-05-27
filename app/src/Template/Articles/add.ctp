<h3>Novo Post</h3>

<div class="row col-md-10">
<form ng-submit="novo()" tb-form class="form-horizontal">
    <div class="form-group form-group-lg">
    <label class="col-sm-2 control-label" for="lg">Título</label>
    <div class="col-sm-5">
      <input class="form-control" ng-model="Article.Article.title" id="lg">
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label class="col-sm-2 control-label" for="sm">Texto</label>
    <div class="col-sm-5">
        <textarea rows="10" ng-model="Article.Article.body"></textarea>
    </div>
  </div>
  <div class="form-group form-group-sm">
    <label class="col-sm-2 control-label" for="sm"></label>
    <div class="col-sm-5">
        <input type="submit" value="Postar">
    </div>
  </div>

</form>
<a href="#/artigos">voltar</a>
</div>
