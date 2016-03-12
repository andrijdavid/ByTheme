{{ Form::open(home_url('/'), 'GET', false, [
'class'=>'navbar-form navbar-left',
'role' => 'search'
])}}
<div class="form-group">
    <input type="text" class="form-control" placeholder="<?php _e('Search', THEME_TEXT_DOMAIN) ?>">
</div>
<button type="submit" class="btn btn-default">
    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
</button>
{{ Form::close()}}