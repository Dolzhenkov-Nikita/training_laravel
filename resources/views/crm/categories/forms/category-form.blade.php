@include('forms._input',[
'label'=>'имя',
'name'=>'name',
'type'=>'string',
'value'=>isset($category)?$category->getName():'',
])
@include('forms._input',[
'label'=>'Подкатегория',
'name'=>'parent_id',
'type'=>'string',
'value'=>isset($category)?$category->getParentId():'',
])
