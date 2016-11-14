-$id = 'date_'.uniqid()
%div{:class=>"form-group" . ($errors->has($name) ? ' has-error' : '') }
  %label =$placeholder
  .input-group.date{:id=>$id}
    -$v = Request::old($name, $obj->$name ? $obj->$name->format('m/d/Y') : \Carbon::now()->format('m/d/Y'))
    %input.form-control{:placeholder => $placeholder, :type => 'text', :name=>$name, :value=>$v}
    %span.input-group-addon
      %span.glyphicon.glyphicon-calendar
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
:javascript
  $(function() {
    $('##{$id}').datetimepicker({
      format: 'M/D/Y',
    });
  });
