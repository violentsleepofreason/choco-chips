<!-- Project -->
<div id="{{ $fieldname }}" class="form-group{{ $errors->has($fieldname) ? ' has-error' : '' }}"{!!  (isset($style)) ? ' style="'.e($style).'"' : ''  !!}>
    <?php $projects = \App\Helpers\Helper::childrens_project_list(); ?>
    {{ Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label')) }}
    <div class="col-md-7{{  ((isset($required) && ($required =='true'))) ?  ' required' : '' }}">
        <select class="" data-endpoint="" data-placeholder="" name="{{ $fieldname }}" style="width: 100%" id="{{ $fieldname }}_select">
            <!-- @if ($id = Input::old($fieldname, (isset($item)) ? $item->{$fieldname} : ''))
                <option value="{{ $id }}" selected="selected">
                    {{ (\App\Models\Project::find(2)) ? \App\Models\project::find(2)->project_name : '' }}
                </option>
            @else
                <option value=""></option>
            @endif -->
            @foreach($projects as $project)
            <?php $parent_name = \App\Helpers\Helper::parent_project($project->id); ?>
            <option value="{{$project->id}}">{{$project->project_name}}&nbsp&nbsp({{$parent_name->project_name}})</option>
            @endforeach
        </select>
    </div>

    


</div>



