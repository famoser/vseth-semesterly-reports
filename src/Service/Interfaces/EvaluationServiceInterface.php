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

use App\Model\SemesterEvaluation;

interface EvaluationServiceInterface
{
    /**
     * @return SemesterEvaluation
     */
    public function getActiveSemesterEvaluation();

    /**
     * @return SemesterEvaluation
     */
    public function getSemesterEvaluation(int $semester);
}
