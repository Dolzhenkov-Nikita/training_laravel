@include('forms._input',[
'label'=>'имя',
'name'=>'name',
'type'=>'string',
'value'=>isset($news)?$news->getName():'',
])
@include('forms._input',[
'label'=>'Изображение',
'name'=>'image_url',
'type'=>'file',
'value'=>isset($news)?$news->getImageUrl():'',
])
@include('forms._input',[
'label'=>'Текст',
'name'=>'description',
'type'=>'trix',
'value'=>isset($news)?$news->getDescription():'',

])
@include('forms._input',[
'label'=>'номер',
'name'=>'ordering',
'type'=>'string',
'value'=>isset($news)?$news->getOrdering():'',
])
{{--@include('forms._input',[--}}
{{--'label'=>'Публикация',--}}
{{--'name'=>'is_publishing',--}}
{{--'type'=>'checkbox',--}}
{{--'value'=>isset($news)?$news->getIsPublishing():'',--}}
{{--])--}}
