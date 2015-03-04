
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<html>
    <body>

    @yield('navbar')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header ">
                <ul class="nav navbar-nav">
                    <li><a class="active" href="#"><strong>Paige's Website </strong></a></li>
                    <li class="dropdown">
                        <a href= "#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Genres Menu <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach ( $genres as $genre )
                            <li>
                                <a href="/genres/{{$genre->genre_name }}/dvds">{{ $genre->genre_name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/">Search</a></li>
                    <li><a href="/dvds/create">Create DVD</a></li>

                </ul>
            </div>
        </div>
    </nav>

        <div class="jumbotron">
            <div class=""header section-padding">
        <div class="background">&nbsp;</div>
            @yield('jumbo')
        </div>
    </div>

         @yield('sidebar')
         <div id="wrapper">
            <div id="sidebar-wrapper">
                <ul class ="nav nav-stacked fixed" id="sidebar">
                 <ul class="nav nav-stacked" style='position:fixed;'>

                 </ul>
             </ul>
            </div>
        </div>
        @show

            <div class="container">
                  @yield('content')
            </div>

        <script type="text/javascript">
            ('.dropdown-toggle').dropdown()

        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


    </body>
    </html>

