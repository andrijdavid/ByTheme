<?php
/**
 * Created by Andrij David.
 * Copyright Andrij David.
 * All right reserved.
 * Date: 3/12/16
 * Time: 4:21 PM
 * As: FaqsController.php
 * For: business
 */
class FaqsController extends BaseController
{
    public function single()
    {
        return View::make('partials.faq.single')->render();
    }

    public function loop()
    {
        return View::make('partials.faqs.loop', [
            'faqs' => FaqModel::all()
        ])->render();
    }
}