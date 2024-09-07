
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>@yield("title","UOBS Library")</title>
    
        @include("admin.layouts.styles")
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  </head>


<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include("admin.layouts.header")

        @include("admin.layouts.left_sidebar")
    
       <div class="content-wrapper ">  
           @yield("content")
       </div>
      
        @show

        @include("admin.layouts.footer") 
      
      
      <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
<!-- ./wrapper -->

        @include("admin.layouts.scripts")

        <!-- Java script -->
   


</body>
</html>
