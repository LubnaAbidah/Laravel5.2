<!DOCTYPE html>
<html>
  <head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MagangApp Neuron</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css')}}" rel="stylesheet" >
    <!-- Ionicons -->
    <link  href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css')}}" rel="stylesheet" >
    <!-- DataTables -->
    <link  href="{{ asset('../bootstrap/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" >
    <!-- Theme style -->
    <link  href="{{ asset('../bootstrap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link  href="{{ asset('../bootstrap/dist/css/AdminLTE.min.css')}}" rel="stylesheet" >
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link  href="{{ asset('../bootstrap/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" >
    <link rel="icon" type="image/png" href="../../bootstrap/img/mne.png">
  </head>
</body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          @yield('content')
        </div>
    </div>
</div>
  <script src="{{ asset('../bootstrap/bootstrap/js/jquery2.min.js')}} "></script>
  <script src="{{ asset('../bootstrap/bootstrap/js/bootstrap.min.js')}} "></script>
<!-- DataTables -->
<script src="{{ asset('../bootstrap/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('../bootstrap/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('../bootstrap/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('../bootstrap/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../bootstrap/dist/js/app.min.js')}}"></scriept>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('../bootstrap/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    /*$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });*/
    $("#example2").DataTable();
    $("#example3").DataTable();
    $("#example4").DataTable();
  });
</script>
</body>
</html>