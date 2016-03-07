<div class="col l12 m12 s12">
{{ Form::open(home_url('/'), 'GET', false, []) }}
    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons large prefix">search</i>
            <input type="text" name="s" class="form-control">
            <label for="s"><?php _e('Search', THEME_TEXT_DOMAIN) ?></label>
        </div>
    </div>
    <div class="center">
        <button class="waves-effect waves-light btn" type="submit">
            <?php _e('Search', THEME_TEXT_DOMAIN) ?>
        </button>
    </div>
{{ Form::close() }}
</div>