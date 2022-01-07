<span color="text-muted">{{  $lable . " " .$model->created_date }}</span> <br>
<a href="{{ $model->user->url }}"  style="float: left">
    <img src="{{ $model->user->avatar }}" alt="">

</a>
<div class="media-body">
    <a href="{{ $model->user->url }}"> {{ $model->user->name }}</a>
</div>