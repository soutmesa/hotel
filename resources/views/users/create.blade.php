@extends ('layouts.layout_home')
@section ('title')
Home | users
@endsection
@section ('stylesheets')

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{url('../../bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{url('../../plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('../../plugins/datepicker/datepicker3.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{url('../../plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{url('../../plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{url('../../plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('../../plugins/select2/select2.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('../../dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('../../dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

@endsection

@section ('content')
  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Create</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>

      {{ Form::open(['url'=>'users/store']) }}
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('username', 'User Name:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                {{ Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'User Name']) }}
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('firstname', 'First Name:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                {{ Form::text('firstname', null, ['class'=>'form-control', 'placeholder'=>'First Name']) }}
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('lastname', 'Last Name:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                {{ Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'Last Name']) }}
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('email', 'Email:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) }}
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('password', 'Password:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('password_confirmation', 'Confirm Password:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                {{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) }}
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('gender', 'Gender:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                {{Form::select('gender', array('female'=>'Female', 'male'=>'Male'), null, ['class'=>'form-control select2'])}}
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Date -->
            <div class="form-group">
              {{ Form::label('dob', 'Birth Date:')}}
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('dob', '', ['class'=>'form-control pull-right', 'id'=>'datepicker']) }}
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('role_id', 'Role:') }}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                <select name="role_id" class="select2 form-control">
                  @foreach($roles as $role)
                  <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>
                <!-- {{Form::select('role_id', $roles, null, ['class'=>'form-control select2'])}} -->
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Date -->
            <div class="form-group">
              {{ Form::label('pob', 'Place of Birth:')}}
              {{ Form::textarea('pob', '', ['class'=>'form-control', 'rows'=>'2']) }}
            <!-- /.form group -->
          </div>
        </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        {{ Form::submit('Create', ['class'=>'btn btn-primary']) }}
      </div>
      <!-- /.box -->
      {{ Form::close() }}

    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->

@endsection

@section ('scripts')

<!-- jQuery 2.2.3 -->
<script src="{{url('../../plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('../../bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{url('../../plugins/select2/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{url('../../plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('../../plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('../../plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('../../plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{url('../../plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{url('../../plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{url('../../plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{url('../../plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{url('../../plugins/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('../../plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('../../dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('../../dist/js/demo.js')}}"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

@endsection