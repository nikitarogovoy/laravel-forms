-if(!isset($help)) $help = ''
-if(!isset($placeholder)) $placeholder = ''
-if(!isset($format)) $format = 'M/D/Y'
-$id = 'date_'.uniqid()
%div{:class=>"form-group  lf-container" . ($errors->has($name) ? ' has-error' : '') }
  %label
    =$placeholder
    @include('forms::partials.help_button')
  @include('forms::partials.help_hint', ['help'=>$help])
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
      format: '#{$format}',
    });
  });
