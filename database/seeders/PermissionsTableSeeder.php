<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_access',
            ],
            [
                'id'    => 24,
                'title' => 'service_create',
            ],
            [
                'id'    => 25,
                'title' => 'service_edit',
            ],
            [
                'id'    => 26,
                'title' => 'service_show',
            ],
            [
                'id'    => 27,
                'title' => 'service_delete',
            ],
            [
                'id'    => 28,
                'title' => 'service_access',
            ],
            [
                'id'    => 29,
                'title' => 'master_data_access',
            ],
            [
                'id'    => 30,
                'title' => 'client_partner_create',
            ],
            [
                'id'    => 31,
                'title' => 'client_partner_edit',
            ],
            [
                'id'    => 32,
                'title' => 'client_partner_show',
            ],
            [
                'id'    => 33,
                'title' => 'client_partner_delete',
            ],
            [
                'id'    => 34,
                'title' => 'client_partner_access',
            ],
            [
                'id'    => 35,
                'title' => 'portfolio_create',
            ],
            [
                'id'    => 36,
                'title' => 'portfolio_edit',
            ],
            [
                'id'    => 37,
                'title' => 'portfolio_show',
            ],
            [
                'id'    => 38,
                'title' => 'portfolio_delete',
            ],
            [
                'id'    => 39,
                'title' => 'portfolio_access',
            ],
            [
                'id'    => 40,
                'title' => 'team_create',
            ],
            [
                'id'    => 41,
                'title' => 'team_edit',
            ],
            [
                'id'    => 42,
                'title' => 'team_show',
            ],
            [
                'id'    => 43,
                'title' => 'team_delete',
            ],
            [
                'id'    => 44,
                'title' => 'team_access',
            ],
            [
                'id'    => 45,
                'title' => 'category_blog_create',
            ],
            [
                'id'    => 46,
                'title' => 'category_blog_edit',
            ],
            [
                'id'    => 47,
                'title' => 'category_blog_show',
            ],
            [
                'id'    => 48,
                'title' => 'category_blog_delete',
            ],
            [
                'id'    => 49,
                'title' => 'category_blog_access',
            ],
            [
                'id'    => 50,
                'title' => 'blog_create',
            ],
            [
                'id'    => 51,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 52,
                'title' => 'blog_show',
            ],
            [
                'id'    => 53,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 54,
                'title' => 'blog_access',
            ],
            [
                'id'    => 55,
                'title' => 'company_profile_create',
            ],
            [
                'id'    => 56,
                'title' => 'company_profile_edit',
            ],
            [
                'id'    => 57,
                'title' => 'company_profile_show',
            ],
            [
                'id'    => 58,
                'title' => 'company_profile_delete',
            ],
            [
                'id'    => 59,
                'title' => 'company_profile_access',
            ],
            [
                'id'    => 60,
                'title' => 'header_description_create',
            ],
            [
                'id'    => 61,
                'title' => 'header_description_edit',
            ],
            [
                'id'    => 62,
                'title' => 'header_description_show',
            ],
            [
                'id'    => 63,
                'title' => 'header_description_delete',
            ],
            [
                'id'    => 64,
                'title' => 'header_description_access',
            ],
            [
                'id'    => 65,
                'title' => 'inbox_create',
            ],
            [
                'id'    => 66,
                'title' => 'inbox_edit',
            ],
            [
                'id'    => 67,
                'title' => 'inbox_show',
            ],
            [
                'id'    => 68,
                'title' => 'inbox_delete',
            ],
            [
                'id'    => 69,
                'title' => 'inbox_access',
            ],
            [
                'id'    => 70,
                'title' => 'product_create',
            ],
            [
                'id'    => 71,
                'title' => 'product_edit',
            ],
            [
                'id'    => 72,
                'title' => 'product_show',
            ],
            [
                'id'    => 73,
                'title' => 'product_delete',
            ],
            [
                'id'    => 74,
                'title' => 'product_access',
            ],
            [
                'id'    => 75,
                'title' => 'category_product_create',
            ],
            [
                'id'    => 76,
                'title' => 'category_product_edit',
            ],
            [
                'id'    => 77,
                'title' => 'category_product_show',
            ],
            [
                'id'    => 78,
                'title' => 'category_product_delete',
            ],
            [
                'id'    => 79,
                'title' => 'category_product_access',
            ],
            [
                'id'    => 80,
                'title' => 'category_content_create',
            ],
            [
                'id'    => 81,
                'title' => 'category_content_edit',
            ],
            [
                'id'    => 82,
                'title' => 'category_content_show',
            ],
            [
                'id'    => 83,
                'title' => 'category_content_delete',
            ],
            [
                'id'    => 84,
                'title' => 'category_content_access',
            ],
            [
                'id'    => 85,
                'title' => 'other_content_create',
            ],
            [
                'id'    => 86,
                'title' => 'other_content_edit',
            ],
            [
                'id'    => 87,
                'title' => 'other_content_show',
            ],
            [
                'id'    => 88,
                'title' => 'other_content_delete',
            ],
            [
                'id'    => 89,
                'title' => 'other_content_access',
            ],
            [
                'id'    => 90,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 91,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 92,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 93,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 94,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 95,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
