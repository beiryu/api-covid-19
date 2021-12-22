<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationCovid extends Model
{
    use HasFactory;
    protected $fillable = ['date',
                        'ha_noi',
                        'hcm',
                        'hung_yen',
                        'vinh_phuc',
                        'da_nang',
                        'yen_bai',
                        'quang_nam',
                        'dong_nai',
                        'hai_duong',
                        'thai_binh',
                        'quang_ngai',
                        'lang_son',
                        'bac_ninh',
                        'thanh_hoa',
                        'dien_bien',
                        'nghe_an',
                        'nam_dinh',
                        'phu_tho',
                        'quang_ninh',
                        'bac_giang',
                        'hai_phong',
                        'thua_thien_hue',
                        'dak_lak',
                        'hoa_binh',
                        'quang_tri',
                        'tuyen_quang',
                        'son_la',
                        'ninh_binh',
                        'thai_nguyen',
                        'long_an',
                        'bac_lieu',
                        'gia_lai',
                        'tay_ninh',
                        'binh_duong',
                        'tra_vinh',
                        'dong_thap',
                        'ha_tinh',
                        'tien_giang',
                        'bac_kan',
                        'lao_cai',
                        'an_giang',
                        'vinh_long',
                        'kien_giang',
                        'khanh_hoa',
                        'phu_yen',
                        'binh_thuan',
                        'can_tho',
                        'baria_vungtau',
                        'binh_dinh',
                        'binh_phuoc',
                        'lam_dong',
                        'ninh_thuan',
                        'ben_tre',
                        'soc_trang',
                        'ca_mau',
                        'hau_giang',
                        'dak_nong',
                        'kon_tum',
                        'ha_giang',
                        'quang_binh',
                        'lai_chau',
                        'cao_bang',
    ];

    public function getProvince()
    {
        return $this->fillable;
    }
}
