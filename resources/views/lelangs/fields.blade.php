<!-- No Paket Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_paket', 'No Paket:') !!}
    {!! Form::text('no_paket', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_deadline', 'Tgl Deadline:') !!}
    {!! Form::date('tgl_deadline', null, ['class' => 'form-control','id'=>'tgl_deadline']) !!}
</div>


{{-- @dd($lelang) --}}
@if (($lelang['is_selected'] ?? false) && $lelang['is_done'] == 0)
    <div class="form-group col-sm-6">
        {!! Form::label('is_done', 'Selesaikan Lelang') !!}
        <label class="checkbox-inline">
             {!! Form::checkbox('is_done', null, $lelang['is_done']) !!}
         </label>
     </div>
@else
    {!! Form::hidden('darielse', true) !!}
    {!! Form::hidden('is_done', true) !!}
@endif

@section('scripts')
    <script type="text/javascript">
        $('#tgl_deadline').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lelangs.index') }}" class="btn btn-default">Cancel</a>
</div>
