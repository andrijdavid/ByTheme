<li>
    <div class="nav-search right">
        <a href="#" onclick="return false;" class="search-open">
            <i class="mdi-action-search"></i>
        </a>
        <div
            class="material-search-overlay circle material-search-overlay-color-bg light-blue darken-2 material-search-overlay-hidden"></div>
        {{ Form::open(home_url('/'), 'GET', false, [
        'class'=>'material-search-form material-search-form-hidden'
        ])}}
        <div class="material-search-form-container">
            <a href="#" onclick="return false;" class="material-search-close">
                <i class="mdi-navigation-close"></i>
            </a>

            <div class="material-search-form-container-row">
                <div class="material-search-label center-align">
                    <label for="search"><h1><?php _e('Search', THEME_TEXT_DOMAIN) ?></h1></label>
                </div>
                <div class="material-search-input">
                    <input id="search" type="text" name="s" class="flow-text" autofocus autocomplete="off">
                    <span class="input-bottom-bar"></span>
                </div>
            </div>
        </div>
        {{ Form::close()}}

    </div>
</li>