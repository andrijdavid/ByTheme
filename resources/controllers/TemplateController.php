<?php

/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 2/12/16
 * Time: 10:14 AM
 * As: TemplateController.php
 * For: business
 */
class TemplateController extends BaseController
{
    public function fullwidth(){
        return View::make('layouts.default')->render();
    }

    public function rightSidebar(){
        return View::make('layouts.rightsidebar')->render();

    }

    public function leftSidebar()
    {
        return View::make('layouts.leftsidebar')->render();
    }
}