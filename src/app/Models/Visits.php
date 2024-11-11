<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Visits extends Model
{
    use HasFactory;
    public $primaryKey = 'visits_id';

    /**
     * Get the post that owns the comment.
     *
     * Syntax: return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
     *
     * Example: return $this->belongsTo(User::class, 'user_id', 'id');
     *
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * function that adds the unique hits
     * @param array $attributes Params to add.
     * @return void
     */
    public function addVisit(array $attributes): void
    {
        // this generates an upsert
        // this is basically hourly based cache so it will not have all the redundant unique entries.
        // of course the time granulation can be smaller
        $data = [
            ['unique_visits' => 1, 'date' => date('Y-m-d H:00:00'), 'url' => $attributes['url'], 'user_id' => $attributes['user_id']]
        ];

        //not needed in mysql, but needed in other dbs
        $uniqueBy = ['url', 'date', 'user_id'];
        $updateColumns = [
            'unique_visits' => DB::raw('unique_visits + 1') // Increment 'views' column
        ];

        DB::table('visits')->upsert($data, $uniqueBy, $updateColumns);
    }

    public function getVisitsByDate(string $startDate, string $endDate, int $userId): Collection
    {
        return Visits::select('url', DB::raw('SUM(unique_visits) as total_unique_visits'))
            ->where('user_id', $userId)
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('url')
            ->get();
    }
}
