<?php

namespace Neubert\EvalancheInterface\Collections\Mailings;

use Neubert\EvalancheInterface\Collections\Collection;

class MailingCollection extends Collection
{
    /**
     * Defines the Class all collection items should be populated with.
     *
     * @var string
     */
    protected $itemClass = Mailing::class;
}
