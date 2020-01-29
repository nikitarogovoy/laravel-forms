-if(!isset($help)) $help = ''
-if(!isset($placeholder)) $placeholder = ''
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
%div{:class=>"form-group  lf-container" . ($errors->has($name) ? ' has-error' : '') }
  %label 
    =$placeholder
    @include('forms::partials.help_button')
  @include('forms::partials.help_hint', ['help'=>$help])
  {!! Form::select($name, $options, Request::old($name, $obj->$name), ['class'=>'form-control', 'placeholder'=>$empty_choice, 'multiple'=>$multiple]) !!}
  -if($errors->has($name))
    .help-block
      %strong
        =$errors->first($name)
