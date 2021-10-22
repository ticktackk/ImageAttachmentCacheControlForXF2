<?php

namespace TickTackk\ImageAttachmentCacheControl\Pub\View;

use XF\Entity\Attachment as AttachmentEntity;

trait AttachmentTrait
{
	/**
	 * @return string|HttpResponseStream
	 *
	 * @throws \Exception
	 */
	public function renderRaw()
	{
		$params = $this->getParams();

		$config = \XF::options()->tckImageAttachmentCacheControl_config;

		if (
			$config['enabled']
			&& isset($params['attachment'])
			&& ($attachment = $params['attachment'])
			&& ($attachment instanceof AttachmentEntity)
			&& $attachment->Data
			&& $attachment->Data->width
			&& $attachment->Data->height
		)
        {
			$cacheability = $config['config']['cacheability'];
			$maxAge = $config['config']['max_age'] * 86400;

			$this->response->header('Expires', \gmdate('D, d M Y H:i:s', \XF::$time + $maxAge) . ' GMT');
			$this->response->header('Cache-Control', "{$cacheability}, max-age={$maxAge}");
        }

		return parent::renderRaw();
	}
}
