<?php

namespace Spatie\Activitylog\Contracts;

use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Eloquent\Builder;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\MorphTo;
interface Activity
{
    public function subject(): MorphTo;

    public function causer(): MorphTo;

    public function getExtraProperty(string $propertyName);

    public function changes(): Collection;

    public function scopeInLog(Builder $query, ...$logNames): Builder;

    public function scopeCausedBy(Builder $query, Model $causer): Builder;

    public function scopeForSubject(Builder $query, Model $subject): Builder;
}
