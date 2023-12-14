<?php

namespace Database\Factories;

use App\Models\CapDo;
use App\Models\ChiNhanh;
use App\Models\GiangVien;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lop>
 */
class LopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $d = random_int(1, 28);
        $m = random_int(1, 12);
        $y = random_int(2022, 2024);
        $ngay_a = Carbon::createFromFormat('d/m/Y', $d.'/'.$m.'/'.$y);
        return [
            'ten' => fake()->unique()->words(8, true),
            'chi_nhanh_id' => ChiNhanh::all()->random()->id,
            'giang_vien_id' => GiangVien::all()->random()->id,
            'cap_do_id' => CapDo::all()->random()->id,
            'ngay_bat_dau' => $ngay_a,
            'ngay_ket_thuc' => $ngay_a->addMonths(2),
            'thoi_luong' => '135',
        ];
    }
}
