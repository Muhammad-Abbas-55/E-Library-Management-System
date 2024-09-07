<script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{!! asset('bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

<script src="{!! asset('dist/js/adminlte.min.js') !!}"></script>

<script src="{!! asset('assets/js/jquery.dataTables.min.js') !!}"></script>

<script src="{!! asset('assets/js/jquery.validate.js') !!}"></script>

<script src="{!! asset('assets/js/sweetalert.js') !!}"></script>

<script src="{!! asset('assets/js/custom-script.js') !!}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



  <script type="text/javascript">
      $(".addRow").on("click",function(){
        addRow();
    });



    function addRow()
    {
      var number = ($("#addRows tr").length - 0) + 1;
      $("#addRows").append('<tr>'+
      	         '<td>'+ number+'</td>'+
                  '<td><input type="text" name="c_name[]" class="form-control"></td>'+

                  '<td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>'+
                  '</tr>');


    }


  $('tbody').on('click','.remove',function(){
   
   $(this).parent().parent().remove();

  });

</script>
  <script type="text/javascript">
      $(".addSerial").on("click",function(){
        addSerial();
    });





    function addSerial()
    {
    	
      var number = ($("#addSerials tr").length - 0) + 1;
      $("#addSerials").append('<tr>'+
      	         '<td>'+ number+'</td>'+
                  '<td><input type="text" name="serial_no[]" class="form-control"></td>'+

                  '<td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>'+
                  '</tr>');


    }


  $('tbody').on('click','.remove',function(){
   
   $(this).parent().parent().remove();

  });

    

  </script>

