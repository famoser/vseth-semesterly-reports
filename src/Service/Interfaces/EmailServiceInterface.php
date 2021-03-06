<?php

/*
 * This file is part of the vseth-semesterly-reports project.
 *
 * (c) Florian Moser <git@famoser.ch>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Interfaces;

interface EmailServiceInterface
{
    public function sendEmail(string $receiver, string $subject, string $body);

    public function sendEmailToAdministrator(string $subject, string $body);
}
