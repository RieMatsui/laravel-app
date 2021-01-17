<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS = [
        1 => ['label' => 'messages.not-done', 'class' => 'badge-danger'],
        2 => ['label' => 'messages.processing', 'class' => 'badge-success'],
        3 => ['label' => 'messages.done', 'class' => 'badge-secondary'],
    ];

    public function getStatusLabelAttribute()
    {
        //status value
        $status = $this->attributes['status'];

        //if status is null , return null character
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute()
    {
        //status valuse
        $status = $this->attributes['status'];

        //if status is null , return null character
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['class'];
    }
    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d');
    }
}
