<div class="example-modal">
  <div class="modal">
    <div class="modal-dialog">
      <div class="modal-content">
      {{ Form::open(['url'=>'','class'=>'form-group']) }}

        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <h4 class="modal-title">Default Modal</h4>

          <div class="alert alert-success fade in">
            <button type="button" class="close close-sm" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
            <strong>Success : </strong> The update process has been completed successfull!
          </div>

        </div>
        
        <div class="modal-body">
          {{ Form::hidden('id', null) }}
          {{ Form::label('name', 'Name : ')}}
          {{ Form::text('name', null, ['class'=>'form-control']) }}
          {{ Form::label('description', 'Description : ')}}
          {{ Form::textarea('description', old('description'), ['class'=>'form-control', 'rows'=>'2']) }}
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancel</button>
          {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
        </div>

      {{ Form::close() }}
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- /.example-modal -->