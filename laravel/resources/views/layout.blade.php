
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<html>
    <body>

        @yield('navbar')
        <div id="headder">
            <nav class="col-xs-3">
                <div class="fixed">
         </div>
                </nav>
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
        </body>
    </html>

@section('page-scropt)