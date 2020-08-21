<?php

namespace TickTackk\ImageAttachmentCacheControl;

use XF\Http\Response as HttpResponse;
use XF\App as BaseApp;
use XF\Repository\User as UserRepo;

class Listener
{
    /**
     * Called after the global \XF\App object has finished running, but before the response is filtered and returned.
     *
     * @param BaseApp      $app      Global App object.
     * @param HttpResponse $response HTTP Response object.
     */
    public static function appComplete(BaseApp $app, HttpResponse &$response) : void
    {
        $attachment = Globals::getImageAttachment();
        if ($attachment === null)
        {
            return;
        }

        $config = $app->options()->tckImageAttachmentCacheControl_config['config'];
        $cacheability = $config['cacheability'];
        $maxAge = $config['max_age'] * 86400;

        $response->header('Expires', \gmdate('D, d M Y H:i:s', \XF::$time + $maxAge) . ' GMT');
        $response->header('Cache-Control', "{$cacheability}, max-age={$maxAge}");
    }
}