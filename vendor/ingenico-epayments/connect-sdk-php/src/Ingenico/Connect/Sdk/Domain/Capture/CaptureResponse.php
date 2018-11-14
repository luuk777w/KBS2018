<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Capture;

use Ingenico\Connect\Sdk\Domain\Capture\Definitions\Capture;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Capture
 */
class CaptureResponse extends Capture
{
    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        return $this;
    }
}
