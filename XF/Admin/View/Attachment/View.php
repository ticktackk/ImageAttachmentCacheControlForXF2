<?php

namespace TickTackk\ImageAttachmentCacheControl\XF\Admin\View\Attachment;

use TickTackk\ImageAttachmentCacheControl\Pub\View\AttachmentTrait as AttachmentViewTrait;

class View extends XFCP_View
{
    use AttachmentViewTrait;

    public function renderRaw()
    {
        $this->setupForTckImageAttachmentCacheControl();

        return parent::renderRaw();
    }
}