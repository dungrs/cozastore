<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserCatalogue;
use App\Models\Language;

class UserCatalogueSeeder extends Seeder
{
    public function run()
    {
        $catalogues = [
            'vn' => [
                ['name' => 'Quản lý nhân sự', 'email' => 'nhansu@example.com', 'phone' => '0901234567', 'description' => 'Phụ trách quản lý nhân sự, tuyển dụng và đào tạo.'],
                ['name' => 'Phát triển sản phẩm', 'email' => 'phattriensanpham@example.com', 'phone' => '0912345678', 'description' => 'Đảm nhận công việc nghiên cứu và phát triển sản phẩm mới.'],
                ['name' => 'Marketing', 'email' => 'marketing@example.com', 'phone' => '0987654321', 'description' => 'Phụ trách chiến lược marketing, quảng cáo và nghiên cứu thị trường.'],
                ['name' => 'Hỗ trợ khách hàng', 'email' => 'hotrokhachhang@example.com', 'phone' => '0945678901', 'description' => 'Cung cấp dịch vụ hỗ trợ và chăm sóc khách hàng.'],
                ['name' => 'Kế toán', 'email' => 'ke_toan@example.com', 'phone' => '0909876543', 'description' => 'Quản lý tài chính, kế toán và các báo cáo thuế.'],
                ['name' => 'Công nghệ thông tin', 'email' => 'it@example.com', 'phone' => '0923456789', 'description' => 'Phát triển, quản lý hệ thống CNTT và hỗ trợ kỹ thuật.'],
                ['name' => 'Vận hành', 'email' => 'vanhanh@example.com', 'phone' => '0965432187', 'description' => 'Đảm bảo hoạt động vận hành của công ty diễn ra suôn sẻ.'],
                ['name' => 'Nghiên cứu và Phát triển', 'email' => 'rnd@example.com', 'phone' => '0976543210', 'description' => 'Nghiên cứu công nghệ mới và cải tiến sản phẩm.'],
                ['name' => 'Pháp chế', 'email' => 'phapche@example.com', 'phone' => '0934567890', 'description' => 'Tư vấn pháp lý và đảm bảo tuân thủ quy định pháp luật.'],
                ['name' => 'Bán hàng', 'email' => 'banhang@example.com', 'phone' => '0954321098', 'description' => 'Xây dựng chiến lược kinh doanh và quản lý khách hàng.'],
                ['name' => 'Chăm sóc đối tác', 'email' => 'doitac@example.com', 'phone' => '0943210987', 'description' => 'Phát triển và duy trì mối quan hệ với đối tác.'],
                ['name' => 'Quản lý chất lượng', 'email' => 'quality@example.com', 'phone' => '0932109876', 'description' => 'Đảm bảo sản phẩm và dịch vụ đạt tiêu chuẩn chất lượng.'],
                ['name' => 'Kho vận', 'email' => 'kho@example.com', 'phone' => '0921098765', 'description' => 'Quản lý kho hàng và vận chuyển sản phẩm.'],
                ['name' => 'Truyền thông nội bộ', 'email' => 'truyenthong@example.com', 'phone' => '0910987654', 'description' => 'Tổ chức sự kiện và truyền thông nội bộ công ty.'],
            ],
            // 'kr' => [
            //     ['name' => '인사 관리', 'email' => 'nhansu@example.com', 'phone' => '0901234567', 'description' => '인사 관리, 채용 및 교육 담당.'],
            //     ['name' => '제품 개발', 'email' => 'phattriensanpham@example.com', 'phone' => '0912345678', 'description' => '신제품 연구 및 개발 담당.'],
            //     ['name' => '마케팅', 'email' => 'marketing@example.com', 'phone' => '0987654321', 'description' => '마케팅 전략, 광고 및 시장 조사 담당.'],
            //     ['name' => '고객 지원', 'email' => 'hotrokhachhang@example.com', 'phone' => '0945678901', 'description' => '고객 지원 및 서비스 제공.'],
            //     ['name' => '회계', 'email' => 'ke_toan@example.com', 'phone' => '0909876543', 'description' => '재무 관리, 회계 및 세금 보고 담당.'],
            // ]
        ];

        foreach ($catalogues as $langCode => $dataList) {
            $language = Language::where('canonical', $langCode)->first();
            if (!$language) continue;

            foreach ($dataList as $data) {
                $userCatalogue = UserCatalogue::firstOrCreate(
                    ['email' => $data['email'], 'phone' => $data['phone']]
                );

                if (!$userCatalogue->languages()->wherePivot('language_id', $language->id)->exists()) {
                    $userCatalogue->languages()->attach($language->id, [
                        'name' => $data['name'],
                        'description' => $data['description']
                    ]);
                }
            }
        }
    }
}
