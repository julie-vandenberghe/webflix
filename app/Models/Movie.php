<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;


    protected $casts = [
        'released_at' => 'date',
    ];

    /**
     * Définit une relation entre la table movies et catégories
     * En PHP => SELECT * FROM movies m INNER JOIN categories c ON c.id = m.category_id;
     */

    public function catefory()
    {
        return $this ->belongsTo(Category::class);

    }


}
