-$id = uniqid().'_mkdn';
%div{:class=>"form-group" . ($errors->has($name) ? ' has-error' : '') }
  %label =$placeholder
  %textarea.form-control{:id=>$id, :name=>$name, :rows=>10, "data-provide"=>'markdown'} {{Request::old($name, $obj->$name)}}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
:javascript
  $(function() {
    var simplemde = new SimpleMDE({ element: $("##{$id}")[0] });
  });
