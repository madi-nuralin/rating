<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionMigration extends Model
{
    use HasFactory,
    	Helpers\HasId;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'src_id',
        'dst_id'
    ];

    public function getSrc(): Submission
    {
    	return Submission::findOrFail($this->src_id);
    }

    public function getDst(): Submission
    {
    	return Submission::findOrFail($this->dst_id);	
    }

    public toArray() {
    	'id' => $this->getId(),
    	'created_at' => $this->created_at,
    	'updated_at' => $this->updated_at
    }
}
