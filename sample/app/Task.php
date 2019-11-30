<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'badge-danger'],
        2 => ['label' => '着手中', 'class' => 'badge-success'],
        3 => ['label' => '完了', 'class' => 'badge-secondary'],
    ];
    public function getStatusLabelAttribute()
    {
        //status valuse
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
    public function getFormattedDueDateAttribure()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes[due_date])->format('Y/m/d');
    }
}
