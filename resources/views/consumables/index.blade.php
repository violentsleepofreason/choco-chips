@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.consumables') }}
@parent
@stop

@section('header_right')
@if($project != 0)
  <div style="margin-bottom: 60px;">    
    <a href="{{ url('project/'.$project.'/components') }}" class="btn btn-primary pull-right" style="margin-right: 10px;"> Components</a>
    <a href="{{ url('project/'.$project.'/consumables') }}" class="btn btn-primary pull-right" style="margin-right: 10px;"> Consumables</a>
    <a href="{{ url('project/'.$project.'/licenses') }}" class="btn btn-primary pull-right" style="margin-right: 10px;"> Licenses</a>
    <a href="{{ url('project/'.$project.'/accessories') }}" class="btn btn-primary pull-right" style="margin-right: 10px;"> Accessories</a>
    <a href="{{ url('project/'.$project.'/hardware') }}" class="btn btn-primary pull-right" style="margin-right: 10px;"> Assets</a>
  </div>
  @endif
  @can('create', \App\Models\Consumable::class)
  <a href="{{ route('consumables.create') }}" class="btn btn-primary pull-right"> {{ trans('general.create') }}</a>
  @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
      <div class="box-body">
        <table
                data-columns="{{ \App\Presenters\ConsumablePresenter::dataTableLayout() }}"
                data-cookie-id-table="consumablesTable"
                data-pagination="true"
                data-id-table="consumablesTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-footer="true"
                data-show-refresh="true"
                data-sort-order="asc"
                data-sort-name="name"
                data-toolbar="#toolbar"
                id="consumablesTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.consumables.index',array('projectID'=>$project)) }}"
                data-export-options='{
                "fileName": "export-consumables-{{ date('Y-m-d') }}",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
        </table>

      </div><!-- /.box-body -->
    </div><!-- /.box -->

  </div> <!-- /.col-md-12 -->
</div> <!-- /.row -->
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['exportFile' => 'consumables-export', 'search' => true,'showFooter' => true, 'columns' => \App\Presenters\ConsumablePresenter::dataTableLayout()])
@stop
