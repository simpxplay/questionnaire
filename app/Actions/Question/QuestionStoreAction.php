<?php

declare(strict_types=1);

namespace App\Actions\Question;

use App\Dto\Question\QuestionDto;
use App\Exceptions\BaseException;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionStoreAction
{
    /**
     * @throws BaseException
     */
    public function handle(QuestionDto $dto): ?Question
    {
        try {
            DB::beginTransaction();

            $question = new Question($dto->toArrayForStore());
            $question->save();

            DB::commit();

            return $question;
        } catch (BaseException $exception) {
            DB::rollBack();
            throw new BaseException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}
