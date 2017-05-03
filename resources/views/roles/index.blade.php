@extends ('layouts.layout_home')
@section ('title')
Home | users
@endsection
@section ('stylesheets')

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ url('../../bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('../../plugins/datatables/dataTables.bootstrap.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('../../dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('../../dist/css/skins/_all-skins.min.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ url('dist/sweetalert.css') }}">

  <!-- Pace style -->
  <link rel="stylesheet" href="{{ url('../../plugins/pace/pace.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

@endsection

@section ('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Lists Table
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Roles</a></li>
        <li class="active">Lists Table</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><small><a href="#" class="fa fa-plus"></a></small> Add New</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Role Name</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th align="center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <!-- get datas from ajax to show here-->
                </tbody>
                <tfoot>
                <!-- <tr>
                  <th>Id</th>
                  <th>Role Name</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th align="center">Actions</th>
                </tr> -->
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@include ('roles.form')

@section ('scripts')

<!-- jQuery 2.2.3 -->
<script src="{{ url('../../plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('../../bootstrap/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ url('../../plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('../../plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ url('../../plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('../../plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('../../dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('../../dist/js/demo.js') }}"></script>
<!-- PACE -->
<script src="{{ url('../../plugins/pace/pace.min.js') }}"></script>
<script src="{{ url('dist/sweetalert.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });
</script>

<script type="text/javascript">
  var token="{{ csrf_token() }}";
  $(document).ready(function(){
    $(document).ajaxStart(function() { Pace.start(); });
    $.ajax({
        url: '{{ url("roles/getDatas") }}',
        headers: {'X-CSRF-TOKEN': token },
        type: 'GET',
        success: function(datas) {
          var datas = JSON.parse(datas);
          console.log();
          if(datas.length >= 1){
            $(".dataTables_empty").css("display", "none");
            var table = $('table > tbody');
            var table2 = '';
            for(var i=0; i < datas.length; i++){
              table2 += '<tr class="role-item-'+datas[i].id+'">'
              table2 += '<td>'+ datas[i].id + '</td>';
              table2 += '<td>'+ datas[i].name + '</td>';
              table2 += '<td>'+ datas[i].description + '</td>';
              table2 += '<td>'+ datas[i].created_at + '</td>';
              table2 += '<td>'+ datas[i].updated_at + '</td>';
              table2 += "<td align=\"center\"><a onclick=\"edit("+datas[i].id+")\" href=\"#\"><span><i class=\"fa fa-edit\"></i></span></a> | <a onclick=\"Delete("+datas[i].id+")\" href=\"#\"><span><i class=\"fa fa-trash\"></i></span></a></td>";
              table2 += '</tr>'
            }
            table.append(table2);
          }
        }
    });
  });

  function Delete(id){
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
  }

  function edit(id)
  {
    $.ajax({
      url: '{{ url("roles/getData") }}/'+id,
      headers: {'X-CSRF-TOKEN': token },
      type: 'GET',
      success: function(data){
        var data = JSON.parse(data);
        $('.alert').css('display', 'none');
        $('.modal').modal('show');
        $('.modal-title').text('Form Edit');
        $('#name').val(data.name);
        $('#description').val(data.description);
        $('input[type="hidden"][name="id"]').val(data.id);
      }
    });
  }

  $(function(){
    $('input[type="submit"]').on('click', function(e){

      e.preventDefault();
      var datas = {};
      datas.id = $('input[type="hidden"][name="id"]').val();
      datas.name = $('#name').val();
      datas.description = $('#description').val();
      var url = '{{ url("roles/putData") }}/' +datas.id;
      var token = $('form.form-group input[type="hidden"][name="_token"]').val();
      $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': token },
        url: url,
        data: datas,
        cache: false,
        success: function(data){
          var data = JSON.parse(data);
          $('tr.role-item-'+ data.id + ' td:nth-child(2)').text(data.name);
          $('tr.role-item-'+ data.id + ' td:nth-child(3)').text(data.description);
          $('.alert').css('display', 'block');
          $('.alert').addClass('fade').addClass('in');
          window.setTimeout(function() {
            $(".alert").fadeTo(2000, 500).slideUp(500, function(){
              $(this).css('display', 'none'); 
            });
          }, 600);
        }
      });

    });
  });

</script>

@endsection