<?php

namespace Database\Factories\Concerns;

trait PicksExistingOrNull
{
    protected function randomExistingOrNull(string $model)
    {
        $existing = $model::inRandomOrder()->first();
        return $existing?->id;
    }
}
