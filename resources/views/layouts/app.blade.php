<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>


    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('mdb/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('mdb/mdb.css') }}">
    <link rel="stylesheet" href="{{ asset('mdb/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mdb/addons/datatables.min.css') }}">

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
    <link rel="stylesheet" href="{{ asset('css') }}/custom.css">
    @stack('css')


</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="page-wrapper chiller-theme toggled">
        @if (Request::is('*login')!=true && Request::is('*reset')!=true)
            @include('layouts.parts.navbar')
        @endif
        @if (Request::is('*login')!=true && Request::is('*reset')!=true)
            @include('layouts.parts.sidebar')
        @endif
        <main class="page-content">
            <div class="container-fluid">


                @yield('content')

            </div>

        </main>
        <!-- page-content" -->
        @if (Request::is('*login')!=true && Request::is('*reset')!=true)
            @include('layouts.parts.footer')
        @endif
        
    </div>
    <!-- page-wrapper -->
    <!-- partial -->
    {{-- <script src="{{ asset('jquery/jquery.min.js') }}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script> --}}

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    {{-- <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('js') }}/script.js"></script>
    <script>
        $(document).ready(function() {
    $('#dataTable').DataTable();
  } );
  $('#summernote').summernote({
    tabsize: 2,
    height: 800
  });
    </script>
    @stack('js')
</body>

</html>