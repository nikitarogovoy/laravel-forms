%div{:class=>"form-group" . ($errors->has($name) ? ' has-error' : '') }
  %label =$placeholder
  %textarea.form-control{:name=>$name, :rows=>10} {{Request::old($name, $obj->$name)}}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
