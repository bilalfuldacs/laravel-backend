<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }
    public function run(): void
{
    Product::create([
        'name' => 'Laptop',
        'description' => 'Gaming Laptop',
        'price' => 1200.00,
        'stock' => 10,
    ]);

    Product::create([
        'name' => 'Mouse',
        'description' => 'Wireless Mouse',
        'price' => 25.99,
        'stock' => 50,
    ]);
}
}