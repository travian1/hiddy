<?php
// مشخص کردن اطلاعات مربوط به لینک کانفیگهای v2ray
$url = 
'https://sub.6box.ir/zTIBedrvxibU1H6/b3bc1c09-0064-4abd-9676-6f6f53541d80/all.txt?name=new_link_IRAN-unknown-new&asn=unknown&mode=new&base64=True';
// مشخص کردن اطلاعات مربوط به فایل کانفیگ v2ray
$filename = 'configs.txt';
// دریافت اطلاعات جدید از لینک
$new_configs = file_get_contents($url);
// بررسی اینکه آیا اطلاعات جدید با اطلاعات قبلی یکسان است یا خیر
$old_configs = file_get_contents($filename); if ($new_configs == 
$old_configs) {
    // اطلاعات جدید با اطلاعات قبلی یکسان است. بنابراین، هیچ کاری انجام 
    // نمی‌دهیم.
} else {
    // اطلاعات جدید با اطلاعات قبلی یکسان نیست. بنابراین، اطلاعات جدید 
    // را در فایل ذخیره می‌کنیم.
    unlink($filename); file_put_contents($filename, $new_configs);
    // نمایش پیغام موفقیت
    echo '<h3>انتقال کانفیگها موفق</h3>';
}
// بررسی اینکه آیا صفحه configs.php در مرورگر باز است یا خیر
if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] === 
'/configs.php') {
    // صفحه configs.php در مرورگر باز است. بنابراین، کانفیگها را به فایل 
    // configs.txt منتقل می‌کنیم.
    $new_configs = file_get_contents($url); file_put_contents($filename, 
    $new_configs);
}
?>
