-if(!isset($help)) $help = ''
:php
  $id = uniqid();
  $file_id = "file_{$id}";
  $remove_id = "remove_{$id}";
  $image_id = "image_{$id}";
  $delete_id = "delete_{$id}";
  if(!isset($image_size)) $image_size = 'thumb';
%div{:class=>"form-group" . ($errors->has($name) ? ' has-error' : '') }
  %label 
    =$placeholder
    @include('forms::partials.help_button')
  @include('forms::partials.help_hint', ['help'=>$help])
  %input{:type=>'hidden', :name=>$name . "_delete", :id=>$delete_id, :value=>0}
  %input.form-control{:id=>$file_id, :placeholder => $placeholder, :type => 'file', :name=>$name}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
  -if($obj->$name)
    %div{:id=>$image_id}
      %img{:src=>$obj->$name->url($image_size)}
      %button.btn.btn-danger.btn-xs{:id=>$remove_id} Remove
  :javascript
    $(function() {
      var has_image = #{$obj->$name != null ? 'true' : 'false'};
      if(has_image)
      {
        $('##{$file_id}').hide();
      }

      $('##{$file_id}').change(function() {
        $('##{$remove_id}').click();
      });
      
      $('##{$image_id} img').click(function() {
        $('##{$file_id}').click();
      });
      
      $('##{$remove_id}').click(function() {
        $('##{$image_id}').hide();
        $('##{$file_id}').show();
        $('##{$delete_id}').val(1);
        return false;
      });
    });