
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    @push('scripts')



    <script src="{{asset('assets/vendor/jquery/jquery-1.12.3.min.js')}}"></script>

    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendor/nano-scroller/nano-scroller.js')}}"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{asset('assets/javascripts/template-script.min.js')}}"></script>
    <script src="{{asset('assets/javascripts/template-init.min.js')}}"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <script src="{{asset('assets/vendor/toastr/toastr.min.js')}}"></script>
    <!--morris chart-->
    <script src="{{asset('assets/vendor/chart-js/chart.min.js')}}"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <!--Examples-->

      <script src="{{asset('assets/vendor/data-table/media/js/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('assets/vendor/data-table/media/js/dataTables.bootstrap.min.js')}}"></script>
<!--Examples-->
      <script src="{{asset('assets/javascripts/examples/tables/data-tables.js')}}"></script>


     <script src="{{asset('assets/javascripts/examples/dashboard.js')}}"></script>
       <script src="{{asset('assets/js/custom.js')}}"></script>
         <script src="{{asset('assets/js/portal.js')}}"></script>



          <script type="text/javascript">
        $(document).ready(function(){
            $('#basic-table').dataTable();

        });

    </script>



<!--    <script type="text/javascript">
    function open_container2(id)
    {
        $.ajax({
            url:'{{ url('admin/manage_student') }}',
            type: 'GET',
            dataType: 'JSON',
            data: { id:id.getAttribute('data-id') },
            success: function(data){
                if(data.success)
                {

                    $('#name').html(data.data.name);
                    $('#email').html(data.data.email);
                    $('#mobile_no').html(data.data.mobile_no);
                    $('#dob').html(data.data.dob);
                    $('#ex_name').html(data.data.exam);
                    $('#exam_date').html(data.data.exam_date);
                    $('#myModal1').modal('show');
                }
            }
        });
    }
</script>
-->



    @endpush

    @stack('scripts')
