<?php

namespace TickTackk\ImageAttachmentCacheControl\XF\Pub\View\Attachment;

use TickTackk\ImageAttachmentCacheControl\Pub\View\AttachmentTrait as AttachmentViewTrait;
use XF\Http\ResponseStream as HttpResponseStream;

class View extends XFCP_View
{
    use AttachmentViewTrait;

    /**
     * @return string|HttpResponseStream
     *
     * @throws \Exception
     */
    public function renderRaw()
    {
        $this->setupForTckImageAttachmentCacheControl();

        return parent::renderRaw();
    }
}