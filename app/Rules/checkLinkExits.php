<?php

namespace App\Rules;

use App\Helpers\ScholarHelper;
use Illuminate\Contracts\Validation\Rule;
use voku\helper\HtmlDomParser;

class checkLinkExits implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $html = HtmlDomParser::file_get_html('http://scholar.google.se/citations?user=' . $value, false, null, 0);
        $result = $html->find("#gsc_rsb_st td.gsc_rsb_std", 0);
        if (!$result) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Id not found';
    }
}
