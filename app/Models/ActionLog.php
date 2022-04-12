<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    use HasFactory,
        Helpers\HasId,
        Helpers\BelongsToUser;

    const ACTION_CREATE = 'create';
    const ACTION_READ = 'read';
    const ACTION_UPDATE = 'updated';
    const ACTION_DELETE = 'delete';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
    	'user_id',
    	'table_name',
    	'table_primary_key_id',
    	'action'
    ];

    public function settings() {
        return $this->hasMany(ActionLogSetting::class);
    }

    public function getTableName() {
    	return $this->table_name;
    }

    public function getTablePrimaryKeyId() {
    	return $this->table_primary_key_id;
    }

    public function getAction() {
    	return $this->action;
    }

    public function toArray() {
    	return [
    		'id' => $this->id,
    		'table_name' => $this->getTableName(),
    		'table_primary_key_id' => $this->getTablePrimaryKeyId(),
    		'action' => $this->getAction(),
    		'created_at' => $this->created_at,
    		'updated_at' => $this->updated_at
    	];
    }
}
