<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void {
        $members = [
            ['kode_member' => 'MBR-001', 'nama' => 'Tania', 'email' => 'tania@gmail.com', 'nomor_hp' => '08123456789', 'jenis_kelamin' => 'P', 'tanggal_daftar' => '2026-03-2'],
            ['kode_member' => 'MBR-002', 'nama' => 'Anastasya', 'email' => 'anastasya@gmail.com', 'nomor_hp' => '08123456788', 'jenis_kelamin' => 'P', 'tanggal_daftar' => '2026-04-4'],
            ['kode_member' => 'MBR-003', 'nama' => 'Aulia', 'email' => 'aulia@gmail.com', 'nomor_hp' => '08123456787', 'jenis_kelamin' => 'P', 'tanggal_daftar' => '2026-04-14'],
            ['kode_member' => 'MBR-004', 'nama' => 'Citra', 'email' => 'citra@gmail.com', 'nomor_hp' => '08123478787', 'jenis_kelamin' => 'P', 'tanggal_daftar' => '2026-05-22'],
            ['kode_member' => 'MBR-005', 'nama' => 'Olivia', 'email' => 'olivia@gmail.com', 'nomor_hp' => '08123445787', 'jenis_kelamin' => 'P', 'tanggal_daftar' => '2026-06-25'],
            ['kode_member' => 'MBR-006', 'nama' => 'Mochi', 'email' => 'mochi@gmail.com', 'nomor_hp' => '08123489787', 'jenis_kelamin' => 'P', 'tanggal_daftar' => '2026-07-20'],
            ['kode_member' => 'MBR-007', 'nama' => 'Titut', 'email' => 'titut@gmail.com', 'nomor_hp' => '08123457787', 'jenis_kelamin' => 'P', 'tanggal_daftar' => '2026-08-26'],
            ['kode_member' => 'MBR-008', 'nama' => 'Abel', 'email' => 'abel@gmail.com', 'nomor_hp' => '08123452287', 'jenis_kelamin' => 'L', 'tanggal_daftar' => '2026-09-22'],
            ['kode_member' => 'MBR-009', 'nama' => 'Oliver', 'email' => 'oliver@gmail.com', 'nomor_hp' => '08123454487', 'jenis_kelamin' => 'L', 'tanggal_daftar' => '2026-10-24'],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}