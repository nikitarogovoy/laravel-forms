-if(!isset($help)) $help = ''
%div{:class=>"form-group" . ($errors->has($name) ? ' has-error' : '') }
  %label 
    =$placeholder
    @include('forms::partials.help_button')
  @include('forms::partials.help_hint', ['help'=>$help])
  %textarea.form-control{:name=>$name, :rows=>10} {{Request::old($name, $obj->$name)}}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
