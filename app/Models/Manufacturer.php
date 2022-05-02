<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Manufacturer extends Model
    {
        use HasFactory;

        protected $fillable = [
            'name', 'image', 'description'
        ];

        public function showManufacturers(): Collection
        {
            return $this->all();
        }
    }
