-if(!isset($help)) $help = ''
-if(!isset($placeholder)) $placeholder = ''
-if(!isset($class)) $class = ''
-if(!isset($multiple)) $multiple = false
-if(!isset($value)) $value = null
-if(!isset($depends)) $depends = false
:php
  if(is_a($options, 'Illuminate\Database\Eloquent\Collection'))
  {
    $new_options = [];
    foreach($options as $p)
    {
      $new_options[$p->id]=$p->name;
    }
    $options = $new_options;
  }
  $empty_choice = '(choose)';
  if(isset($options[0]) && is_array($options[0]))
  {
    $n = [];
    foreach($options as $o)
    {
      if($o['key']=='')
      {
        $empty_choice = $o['display'];
        continue;
      }
      $n[$o['key']] = $o['display'];
    }
    $options = $n;
  }
  $addOptions = [
    'class' => "form-control {$class}",
    'multiple' => $multiple,
  ];
  if (!$multiple) {
    $addOptions['placeholder'] = $empty_choice;
  }
  if ($depends) {
    $allOptions = $options;
    $n = [];
    foreach($options as $os) {
      foreach($os as $io=>$o) {
        $n[$io] = $o;
      }
    }
    $options = $n;
  }

%div{:class=>"form-group  lf-container" . ($errors->has($name) ? ' has-error' : '') }
  %label
    =$placeholder
    @include('forms::partials.help_button')
  @include('forms::partials.help_hint', ['help'=>$help])
  {!! Form::select($name, $options, $value ?? Request::old($name, $obj->$name), $addOptions) !!}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
-if($depends)
  :javascript
    window.{{$name}}Field = {!! json_encode($allOptions) !!}
    $(function() {
      $('body').on('change', 'select[name={{$depends}}]', function () {
        let $this = $(this),
          $currentOptions = $('select[name={{$name}}] option');

        if (window.{{$name}}Field[$this.val()]) {
          $currentOptions.each(function(index, item) {
            if (window.{{$name}}Field[$this.val()][$(item).attr('value')]) {
              $(item).show().prop('disabled', false);
            } else {
              $(item).hide().prop('disabled', true);
            }
          });
        } else {
          $currentOptions.each(function(index, item) {
            $(item).hide().prop('disabled', true);
          });
        }
        $('select[name={{$name}}]').val("");
      });
    });

