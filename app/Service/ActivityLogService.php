<?php
namespace App\Service;

use Spatie\Activitylog\Models\Activity;

class ActivityLogService {
    public static function log($message, $model = null, $event = null) {
        $logger = activity()
            ->event($event)
            ->causedBy(auth()->user());

        if ($model) {
            $logger->performedOn($model);
        }
        
        $logger->log($message);

    }

    public static function getActivityLogs() {
        return Activity::with(['causer', 'subject'])
            ->when(request('search'), function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('description', 'like', '%' . request('search') . '%');
                });
            })
            ->when(request('order'), function ($query) {
                $query->orderBy('id', request('order'));
            })
            ->where('causer_id', auth()->id())
            ->paginate(10);
    }
}