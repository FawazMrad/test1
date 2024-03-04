<?php
if (!function_exists('preferredLang')) {
    /**
     * Get the preferred language from the request headers.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */

    function preferedLang(\Illuminate\Http\Request $request)
    {
        return $request->header('lang');
    }
}
     function checkLang(\Illuminate\Http\Request $request)
{
    $body = $request->getContent();
    // Check if the body contains Arabic characters
    if (preg_match('/\p{Arabic}/u', $body))
        return'ar';

        return 'en';
}
