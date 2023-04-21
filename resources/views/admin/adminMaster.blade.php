
<!doctype html>
<html lang="en">

    <head>
        {{ asset ('backend/')}}
        <meta charset="utf-8" />
        <title>Dashboard | Upcube - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- jquery.vectormap css -->
        <link href= "{{ asset ('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href=" {{ asset ('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href=" {{ asset ('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href=" {{ asset ('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href=" {{ asset ('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href=" {{ asset ('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >

    </head>

    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <!-- ========== Header Start ========== -->
            @include('admin.includes.header')
            <!-- ========== Header End   ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.includes.sidebar')
            <!-- ========== Left Sidebar End   ===========-->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class ='main-content'>
                
                    @yield('admin')
                <!-- End Page-content -->
                <!-- ========== Footer Start ========== -->
                @include('admin.includes.footer')
                <!-- ========== Footer End   ========== -->
            </div>

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src=" {{ asset ('backend/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src=" {{ asset ('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src=" {{ asset ('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src=" {{ asset ('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src=" {{ asset ('backend/assets/libs/node-waves/waves.min.js')}}"></script>

        
        

        <!-- jquery.vectormap map -->
        <script src= "{{ asset ('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src=" {{ asset ('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

        <!-- Required datatable js -->
        <script src=" {{ asset ('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src=" {{ asset ('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        
        <!-- Responsive examples -->
        <script src=" {{ asset ('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src=" {{ asset ('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <script src=" {{ asset ('backend/assets/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src=" {{ asset ('backend/assets/js/app.js')}}"></script>


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

         <!--tinymce js-->
         <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }} "></script>

         <!-- init js -->
         <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }} "></script>
        <!-- Required datatable js -->
         <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
         <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 
             <!-- Datatable init js -->
         <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script src="{{ asset('backend/assets/js/code.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>

        <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
        </script>

    </body>

</html>