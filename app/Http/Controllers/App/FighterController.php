<?php

declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\FighterStoreRequest;
use Illuminate\Support\Facades\Http;
use Modules\Fighters\DataTransferObjects\FighterDto;
use Modules\Fighters\Interfaces\FighterServiceInterface;
use Modules\Fighters\Resources\FighterResource;

class FighterController extends Controller
{
    public function __construct(
        protected FighterServiceInterface $service
    ) {
    }

    /**
     * @param FighterStoreRequest $request
     * @return $fighter
     */
    public function store(FighterStoreRequest $request)
    {
        $fighter = $this->service->store(dto: new FighterDto(...$request->validated()));

        return FighterResource::make($fighter);
    }
}
