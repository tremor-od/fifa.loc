
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Big admin panel</title>

    <!-- Bootstrap -->
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/bootstrap-theme.min.css')}}

    {{HTML::script('scripts/jquery-1.11.1.min.js')}}
    {{HTML::script('scripts/bootstrap.min.js')}}
    {{HTML::script('scripts/for_admin.js')}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{HTML::script('scripts/tinymce/tinymce.min.js')}}
    {{HTML::script('scripts/tinymce/tiny_option.js')}}


</head>
<body>
<div class="container theme-showcase">

    <nav class="navbar navbar-inverse" role="navigation">

        <div class="navbar-header">
            <a href="/" class="navbar-brand"><span class="glyphicon glyphicon-backward"></span> Fifa</a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">

                <li class="{{ (Request::segment(2) == 'page') ? 'active':'' }}">
                    <a href="/admin/page">static pages</a>
                </li>
                <li class="{{ (Request::segment(2) == 'pack') ? 'active':'' }}">
                    <a href="/admin/pack">packs</a>
                </li>
                <li class="{{ (Request::segment(2) == 'user') ? 'active':'' }}">
                    <a href="/admin/user">users</a>
                </li>
                <li class="{{ (Request::segment(2) == 'transaction') ? 'active':'' }}">
                    <a href="/admin/transaction">Transactions</a>
                </li>
                <li class="{{ (Request::segment(2) == 'transactionType') ? 'active':'' }}">
                    <a href="/admin/transactionType">Transaction Type</a>
                </li>
                <li class="{{ (Request::segment(2) == 'packStatistic') ? 'active':'' }}">
                    <a href="/admin/packStatistic">Statistic for Packs</a>
                </li>
                <li class="{{ (Request::segment(2) == 'openedPacks') ? 'active':'' }}">
                    <a href="/admin/openedPacks">Opened Packs</a>
                </li>
                <li class="{{ (Request::segment(2) == 'faq') ? 'active':'' }}">
                    <a href="/admin/faq">FAQ</a>
                </li>
                <li class="{{ (Request::segment(2) == 'card') ? 'active':'' }}">
                    <a href="/admin/card">Card</a>
                </li>
                <li class="{{ (Request::segment(2) == 'cardType') ? 'active':'' }}">
                    <a href="/admin/cardType">Card type</a>
                </li>
                <li class="{{ (Request::segment(2) == 'cardRole') ? 'active':'' }}">
                    <a href="/admin/cardRole">Card role</a>
                </li>
                <li class="{{ (Request::segment(2) == 'exchange') ? 'active':'' }}">
                    <a href="/admin/exchange">Exchange rate</a>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/auth/logout/">Exit</a></li>
            </ul>

        </div>

    </nav>

    <div class="panel panel-default">
        <div class="panel-body">

            @yield('content')

        </div>
    </div>
</div>
</body>
</html>