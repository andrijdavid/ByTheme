<?php
/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 2/16/16
 * Time: 9:30 AM
 * As: view.php
 * For: business
 */
use Themosis\Facades\View;

View::share([
    'today' => \Carbon\Carbon::now()

]);