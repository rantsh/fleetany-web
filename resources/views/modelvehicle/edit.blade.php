@extends('layouts.default')
@extends('layouts.edit')

@section('title')
<h1>{{Lang::get("general.ModelVehicle")}}</h1>
@stop

@section('sub-title')
@if ($modelvehicle->id)
{{$modelvehicle->name}}
@else
{{Lang::get("general.newmodelvehicle")}}
@endif
@stop

@section('breadcrumbs', Breadcrumbs::render('modelvehicle.edit', $modelvehicle))

@section('edit')

@if (!$modelvehicle->id)
{!! Form::open(array('route' => 'modelvehicle.store')) !!}
@else
{!! Form::model('$modelvehicle', [
        'method'=>'PUT',
        'route' => ['modelvehicle.update',$modelvehicle->id]
    ]) !!}
@endif
    <div class="form-group col-lg-12">
        {!!Form::label('name', Lang::get('general.name'))!!}
        {!!Form::text('name', $modelvehicle->name, array('class' => 'form-control'))!!}
    </div>

    <div class="form-group col-lg-12">
        {!!Form::label('type_vehicle_id', Lang::get('general.type_vehicle_id'))!!}
        {!!Form::select('type_vehicle_id', $typevehicle, $modelvehicle->type_vehicle_id, array('class' => 'form-control'))!!}
    </div>

    <div class="form-group col-lg-12">
        {!!Form::label('year', Lang::get('general.year'))!!}
        {!!Form::text('year', $modelvehicle->year, array('class' => 'form-control'))!!}
    </div>

    <div class="form-group col-lg-12">
        {!!Form::label('number_of_wheels', Lang::get('general.number_of_wheels'))!!}
        {!!Form::text('number_of_wheels', $modelvehicle->number_of_wheels, array('class' => 'form-control'))!!}
    </div>

    <button type="submit" class="btn btn-primary">{{Lang::get('general.Submit')}}</button>
    <button type="reset" class="btn btn-primary">{{Lang::get('general.Reset')}}</button>
{!! Form::close() !!}

@stop