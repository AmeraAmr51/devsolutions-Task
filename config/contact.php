<?php

return [


    /*
    |--------------------------------------------------------------------------
    | Contact Mode
    |--------------------------------------------------------------------------
    |
    | Mode only values: "test" or "live"
    |
    */

    "username" => env('CONTACT_USERNAME'),

    "password" => env('CONTACT_PASSWORD'),

    "mode"     => env('CONTACT_MODE'),

    /*
    |--------------------------------------------------------------------------
    | Contact currency
    |--------------------------------------------------------------------------
    | EGP , SAR , USD, .. etc
    */

    "currency" => "EGP" ,

    /*
    |--------------------------------------------------------------------------
    | TEST Payment Request url
    |--------------------------------------------------------------------------
    */

    "test_urls" => [
            "login_url"    => "http://laas-staging.contact.eg/users/login",
            "client_existance_url"    => "http://laas-staging.contact.eg/clients/check-existence",
            "client_info_url"    => "http://laas-staging.contact.eg/clients/info",
            "contract_info_url"    => "http://laas-staging.contact.eg/clients/contracts",
            "generate_s3_url"    => "http://laas-staging.contact.eg/s3/generate-presigned-url",
            "upload_ocr_url"    => "http://laas-staging.contact.eg/ocr/upload-to-ocr",
            "get_ocr_result_url"    => "http://laas-staging.contact.eg/ocr/get-ocr-result",
            "instant_approval_url"    => "http://laas-staging.contact.eg/instant-approvals/submit",

        ],
    /*
    |--------------------------------------------------------------------------
    | LIVE Payment Request url
    |--------------------------------------------------------------------------
    */

    "live_urls" => [
    ],

    /*
    |--------------------------------------------------------------------------
    | TEST Payment Request url
    |--------------------------------------------------------------------------
    */

    "test_shopping_urls" => [
        "login_url"    => "http://cam-test.contact.eg:52707/GetGoCAMService/login",
        "get_cate"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getCategories",
        "get_sub_cate"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getSubCategories",
        "get_items"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getItems",
        "get_package"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getPackage",
        "get_balance"    => "http://cam-test.contact.eg:52707/GetGoCAMService/validateBalance",
        "get_tenor"    => "http://cam-test.contact.eg:52707/GetGoCAMService/validateTenor",
        "get_calc_intall"    => "http://cam-test.contact.eg:52707/GetGoCAMService/calcInstallment",
        "get_client_mob"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getClientMobileNo",

        "submit_invoice"    => "http://cam-test.contact.eg:52707/GetGoCAMService/submitInvoice",
        "submit_invoice_otp"    => "http://cam-test.contact.eg:52707/GetGoCAMService/submitInvoiceOTP",
        "get_invoices"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getRecentInvoices",
        "get_invoice_det"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getInvoiceDetails",

        "get_refund_item"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getRefundableItems",
        "allow_refund_item"    => "http://cam-test.contact.eg:52707/GetGoCAMService/allowRefundItem",
        "submit_refund"    => "http://cam-test.contact.eg:52707/GetGoCAMService/submitRefund",
        "submit_refund_otp"    => "http://cam-test.contact.eg:52707/GetGoCAMService/submitRefundOTP",
        "get_refund_det"    => "http://cam-test.contact.eg:52707/GetGoCAMService/getRefundDetails",

        "logout_url"    => "http://cam-test.contact.eg:52707/GetGoCAMService/logout",
    ],

    /*
    |--------------------------------------------------------------------------
    | LIVE Payment Request url
    |--------------------------------------------------------------------------
    */

    "live_shopping_urls" => [
    ],



];