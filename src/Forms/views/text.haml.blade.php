-if(!isset($help)) $help = ''
%div{:class=>"form-group" . ($errors->has($name) ? ' has-error' : '') }
  %label 
    =$placeholder
    @include('forms::partials.help_button')
  @include('forms::partials.help_hint', ['help'=>$help])
  %input.form-control{:placeholder => $placeholder, :type => 'text', :name=>$name, :value=>Request::old($name, $obj->$name)}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
