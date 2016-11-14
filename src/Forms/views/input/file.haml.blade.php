:php
  $id = uniqid();
  $file_id = "file_{$id}";
  $remove_id = "remove_{$id}";
  $preview_id = "preview_{$id}";
  $delete_id = "delete_{$id}";
%div{:class=>"form-group" . ($errors->has($name) ? ' has-error' : '') }
  %label =$placeholder
  %input{:type=>'hidden', :name=>$name . "_delete", :id=>$delete_id, :value=>0}
  %input.form-control{:placeholder => $placeholder, :type => 'file', :name=>$name}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
  -if($obj->$name)
    %div{:id=>$preview_id}
      Current file:
      =$obj->$name->att_file_name
      %button.btn.btn-danger.btn-xs{:id=>$remove_id} Remove
  :javascript
    $(function() {
      var has_file = #{$obj->$name != null ? 'true' : 'false'};
      if(has_file)
      {
        $('##{$file_id}').hide();
      }

      $('##{$file_id}').change(function() {
        $('##{$remove_id}').click();
      });
      
      $('##{$preview_id} img').click(function() {
        $('##{$file_id}').click();
      });
      
      $('##{$remove_id}').click(function() {
        $('##{$preview_id}').hide();
        $('##{$file_id}').show();
        $('##{$delete_id}').val(1);
        return false;
      });
    });