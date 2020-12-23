<?php

namespace Spatie\Activitylog\Traits;

use Jenssegers\Mongodb\Relations\MorphMany;
use Spatie\Activitylog\ActivitylogServiceProvider;

trait CausesActivity
{
    public function actions(): MorphMany
    {
        return $this->morphMany(
            ActivitylogServiceProvider::determineActivityModel(),
            'causer'
        );
    }
}
