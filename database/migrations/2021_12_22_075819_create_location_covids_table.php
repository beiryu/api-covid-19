<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_covids', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('ha_noi');
            $table->integer('hcm');
            $table->integer('hung_yen');
            $table->integer('vinh_phuc');
            $table->integer('da_nang');
            $table->integer('yen_bai');
            $table->integer('quang_nam');
            $table->integer('dong_nai');
            $table->integer('hai_duong');
            $table->integer('thai_binh');
            $table->integer('quang_ngai');
            $table->integer('lang_son');
            $table->integer('bac_ninh');
            $table->integer('thanh_hoa');
            $table->integer('dien_bien');
            $table->integer('nghe_an');
            $table->integer('nam_dinh');
            $table->integer('phu_tho');
            $table->integer('quang_ninh');
            $table->integer('bac_giang');
            $table->integer('hai_phong');
            $table->integer('thua_thien_hue');
            $table->integer('dak_lak');
            $table->integer('hoa_binh');
            $table->integer('quang_tri');
            $table->integer('tuyen_quang');
            $table->integer('son_la');
            $table->integer('ninh_binh');
            $table->integer('thai_nguyen');
            $table->integer('long_an');
            $table->integer('bac_lieu');
            $table->integer('gia_lai');
            $table->integer('tay_ninh');
            $table->integer('binh_duong');
            $table->integer('tra_vinh');
            $table->integer('dong_thap');
            $table->integer('ha_tinh');
            $table->integer('tien_giang');
            $table->integer('bac_kan');
            $table->integer('lao_cai');
            $table->integer('an_giang');
            $table->integer('vinh_long');
            $table->integer('kien_giang');
            $table->integer('khanh_hoa');
            $table->integer('phu_yen');
            $table->integer('binh_thuan');
            $table->integer('can_tho');
            $table->integer('baria_vungtau');
            $table->integer('binh_dinh');
            $table->integer('binh_phuoc');
            $table->integer('lam_dong');
            $table->integer('ninh_thuan');
            $table->integer('ben_tre');
            $table->integer('soc_trang');
            $table->integer('ca_mau');
            $table->integer('hau_giang');
            $table->integer('dak_nong');
            $table->integer('kon_tum');
            $table->integer('ha_giang');
            $table->integer('quang_binh');
            $table->integer('lai_chau');
            $table->integer('cao_bang');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_covids');
    }
}
