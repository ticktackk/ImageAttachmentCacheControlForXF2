<?php

namespace TickTackk\ImageAttachmentCacheControl\Pub\View;

use TickTackk\ImageAttachmentCacheControl\Globals;
use XF\Entity\Attachment as AttachmentEntity;
use XF\Entity\User as UserEntity;
use XF\Repository\User as UserRepo;

trait AttachmentTrait
{
    /**
     * @throws \Exception
     */
    public function setupForTckImageAttachmentCacheControl() : void
    {
        if (!\XF::options()->tckImageAttachmentCacheControl_config['enabled'])
        {
            return;
        }

        Globals::setImageAttachment($this->getImageAttachmentFromParamsForTckImageAttachmentCacheControl());
    }

    /**
     * @throws \Exception
     */
    protected function getImageAttachmentFromParamsForTckImageAttachmentCacheControl() :? AttachmentEntity
    {
        $params = $this->getParams();
        if (!\array_key_exists('attachment', $params))
        {
            return null;
        }

        $attachment = $params['attachment'];
        if (!$attachment instanceof AttachmentEntity || !$attachment->Data)
        {
            return null;
        }

        /** @var AttachmentEntity $attachment */
        if (!$attachment->Data->width || !$attachment->Data->height)
        {
            return null;
        }

        return $attachment;
    }
}