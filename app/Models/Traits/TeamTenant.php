<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait TeamTenant
{
    public static function bootTeamTenant(): void
    {
        static::creating(function (Model $model) {
            if (! $model->team_id) {
                $model->team_id = Auth::user()->currentTeam->id;
            }
        });

        self::filter();
    }

    private static function filter(): void
    {
        static::addGlobalScope('teamTenantFilter', function (Builder $builder) {
            $builder->where('team_id', Auth::user()->currentTeam->id);
        });
    }
}
