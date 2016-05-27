<!-- Raiz da Aplicação Angular -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs - Angular</title>
</head>
<body ng-app="Articles">
    <div ng-controller="ArticlesController">
    
        <div class="container">
            <div class="jumbotron">
                <h1>Blog do Rh</h1>
                <p>Aplicação Teste</p>
            </div>
            <ng-view></ng-view>

        </div>
    </div>








<!-- Carregamento dos Scripts -->
    <?php echo $this->Html->script('jquery.min') ?>
    <?php echo $this->Html->script('angular.min') ?>
    <?php echo $this->Html->script('angular-resource.min') ?>
    <?php echo $this->Html->script('angular-route.min') ?>
    <?php echo $this->Html->script('core.js') ?>
    <!-- Fim do Carregamento dos Scripts -->
</body>
</html>