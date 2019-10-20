@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.components') }}
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
  @can('create', \App\Models\Component::class)
    <a href="{{ route('components.create') }}" class="btn btn-primary pull-right"> {{ trans('general.create') }}</a>
  @endcan
@stop

{{-- Page content --}}
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <table
                data-columns="{{ \App\Presenters\ComponentPresenter::dataTableLayout() }}"
                data-cookie-id-table="componentsTable"
                data-toolbar="#toolbar"
                data-pagination="true"
                data-id-table="componentsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-footer="true"
                data-show-refresh="true"
                data-sort-order="asc"
                data-sort-name="name"
                id="componentsTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.components.index',array('projectID'=>$project)) }}"
                data-export-options='{
                "fileName": "export-components-{{ date('Y-m-d') }}",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['exportFile' => 'components-export', 'search' => true, 'showFooter' => true, 'columns' => \App\Presenters\ComponentPresenter::dataTableLayout()])



@stop
