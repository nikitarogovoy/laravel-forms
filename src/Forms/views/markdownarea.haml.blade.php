-if(!isset($help)) $help = ''
-if(!isset($placeholder)) $placeholder = ''
-$id = uniqid().'_mkdn';
%div{:class=>"form-group  lf-container" . ($errors->has($name) ? ' has-error' : '') }
  %label 
    =$placeholder
    @include('forms::partials.help_button')
  @include('forms::partials.help_hint', ['help'=>$help])
  %textarea.form-control{:id=>$id, :name=>$name, :rows=>10, "data-provide"=>'markdown'} {{Request::old($name, $obj->$name)}}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
:javascript
  $(function() {
    var simplemde = new SimpleMDE({ element: $("##{$id}")[0] });
  });
