<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'groupby',
        'name',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

    static public function getRecord()
    {
        $permissions = Permission::all()->groupBy('groupby');

        $result = [];

        foreach ($permissions as $groupName => $groupItems) {
            $data = [
                'id' => $groupItems->first()->id,
                'name' => $groupName,
                'group' => $groupItems->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                    ];
                })->toArray(),
            ];

            $result[] = $data;
        }

        return $result;
    }
}
