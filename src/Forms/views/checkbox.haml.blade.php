%div{:class=>"form-group" . ($errors->has($name) ? ' has-error' : '') }
  %label
    %input{:type=>"hidden", :name=>$name, :value=>0}
    {!! Form::checkbox($name, 1, Request::old($name, $obj->$name)); !!}
    =$placeholder
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
