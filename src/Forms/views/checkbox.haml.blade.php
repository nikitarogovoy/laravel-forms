-if(!isset($help)) $help = ''
-if(!isset($placeholder)) $placeholder = ''
%div{:class=>"form-group  lf-container" . ($errors->has($name) ? ' has-error' : '') }
  %label
    %input{:type=>"hidden", :name=>$name, :value=>0}
    {!! Form::checkbox($name, 1, Request::old($name, $obj->$name)); !!}
    =$placeholder
    @include('forms::partials.help_button')
  @include('forms::partials.help_hint', ['help'=>$help])
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
