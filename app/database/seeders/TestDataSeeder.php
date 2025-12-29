<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear Usuario Administrador (si no existe)
        $admin = User::firstOrCreate(
            ['email' => 'admin@ejemplo.com'],
            [
                'name' => 'Administrador Sistema',
                'password' => Hash::make('admin123'),
            ]
        );
        $admin->assignRole('Administrador');

        // 2. Proveedores de prueba
        $suppliers = [
            ['name' => 'Distribuidora Global', 'address' => 'Calle Falsa 123', 'phone' => '123456789'],
            ['name' => 'Alimentos Frescos SA', 'address' => 'Av. Principal 456', 'phone' => '987654321'],
        ];

        foreach ($suppliers as $s) {
            Supplier::firstOrCreate(['name' => $s['name']], $s);
        }

        // 3. Productos de prueba
        $products = [
            ['name' => 'Hamburguesa Clásica', 'description' => 'Deliciosa hamburguesa con queso', 'purchase_price' => 5.00, 'sale_price' => 12.00],
            ['name' => 'Papas Fritas', 'description' => 'Papas crocantes', 'purchase_price' => 1.50, 'sale_price' => 4.00],
            ['name' => 'Refresco 500ml', 'description' => 'Coca Cola u otros', 'purchase_price' => 0.80, 'sale_price' => 2.50],
            ['name' => 'Pizza Familiar', 'description' => 'Pizza de pepperoni', 'purchase_price' => 8.00, 'sale_price' => 18.00],
        ];

        foreach ($products as $p) {
            Product::firstOrCreate(['name' => $p['name']], $p);
        }

        // 4. Inventario inicial
        $allProducts = Product::all();
        foreach ($allProducts as $product) {
            Inventory::firstOrCreate(
                ['product_id' => $product->id],
                [
                    'quantity' => rand(10, 50),
                    'batch' => 'LOTE-' . rand(100, 999),
                    'expiration_date' => now()->addMonths(6),
                ]
            );
        }

        // 5. Algunas ventas de prueba
        if (Sale::count() == 0) {
            for ($i = 0; $i < 5; $i++) {
                $sale = Sale::create([
                    'user_id' => $admin->id,
                    'total' => 0,
                ]);

                $total = 0;
                $randomProducts = $allProducts->random(rand(1, 3));
                
                foreach ($randomProducts as $product) {
                    $qty = rand(1, 3);
                    $subtotal = $qty * $product->sale_price;
                    SaleDetail::create([
                        'sale_id' => $sale->id,
                        'product_id' => $product->id,
                        'quantity' => $qty,
                        'unit_price' => $product->sale_price,
                        'subtotal' => $subtotal,
                    ]);
                    $total += $subtotal;
                }

                $sale->update(['total' => $total]);
            }
        }
    }
}
