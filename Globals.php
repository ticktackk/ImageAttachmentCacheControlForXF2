<?php

namespace TickTackk\ImageAttachmentCacheControl;

use XF\Entity\Attachment as AttachmentEntity;

class Globals
{
    /**
     * @var null|AttachmentEntity
     */
    protected static $imageAttachment = null;

    public static function setImageAttachment(?AttachmentEntity $attachment) : void
    {
        static::$imageAttachment = $attachment;
    }

    public static function getImageAttachment() :? AttachmentEntity
    {
        return static::$imageAttachment;
    }

    /**
     * Private constructor, use statically.
     */
    private function __construct()
    {
    }
}