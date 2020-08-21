<?php

namespace TickTackk\ImageAttachmentCacheControl\XF\Pub\View\Attachment;

use TickTackk\ImageAttachmentCacheControl\Pub\View\AttachmentTrait as AttachmentViewTrait;
use XF\App as BaseApp;
use XF\Mvc\Entity\Finder;
use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Repository;
use XF\Service\AbstractService;
use XF\Mvc\Entity\Manager as EntityManager;
use XF\Job\Manager as JobManager;

class View extends XFCP_View
{
    use AttachmentViewTrait;

    public function renderRaw()
    {
        $this->setupForTckImageAttachmentCacheControl();

        return parent::renderRaw();
    }
}