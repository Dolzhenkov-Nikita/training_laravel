@include('forms._input',[
'label'=>'имя',
'name'=>'name',
'type'=>'имя',
'value'=>isset($user)?$user->getName():'',
])
@include('forms._input',[
'label'=>'email',
'name'=>'email',
'type'=>'email',
'value'=>isset($user)?$user->getEmail():'',
])
@include('forms._input',[
'label'=>'Пароль',
'name'=>'password',
'type'=>'password',
'value'=>isset($user)?$user->getAuthPassword():'',
])
