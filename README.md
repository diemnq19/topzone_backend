Hướng dẫn bắt đầu với Laravel
Cài đặt môi trường
Cài đặt PHP: Đầu tiên, bạn cần cài đặt PHP trên máy tính của bạn. Bạn có thể tải phiên bản mới nhất từ trang web chính thức của PHP: 

https://www.php.net/

Cài đặt Composer: Composer là một trình quản lý gói PHP phổ biến. Bạn có thể tải Composer từ trang web chính thức: 

https://getcomposer.org/

Cài đặt Laravel Installer: Mở cửa sổ dòng lệnh và chạy câu lệnh sau để cài đặt Laravel Installer toàn cục:

``` composer global require laravel/installer``` 

Clone và cấu hình ứng dụng Laravel
Clone mã nguồn ứng dụng: Mở cửa sổ dòng lệnh và điều hướng đến thư mục bạn muốn lưu trữ mã nguồn của ứng dụng. Sau đó, chạy lệnh sau để clone mã nguồn từ kho lưu trữ:

``` git clone https://github.com/ducvo177/graduation-thesis-sharing.git``` 

Di chuyển vào thư mục ứng dụng: Chạy lệnh sau để di chuyển vào thư mục ứng dụng:

``` cd my-laravel-app``` 

Tạo tệp .env: Laravel sử dụng tệp .env để cấu hình ứng dụng. Bạn cần tạo một bản sao của tệp .env.example và đặt các thông số cấu hình cho máy của bạn:

``` cp .env.example .env``` 

Tạo khóa ứng dụng: Chạy lệnh sau để tạo khóa ứng dụng:

``` php artisan key:generate``` 

Cài đặt các phụ thuộc
Cài đặt các gói Composer: Chạy lệnh sau để cài đặt tất cả các gói Composer cần thiết cho ứng dụng Laravel:

``` composer install``` 

Chạy ứng dụng
Chạy máy chủ phát triển: Chạy lệnh sau để khởi động máy chủ phát triển của Laravel:

``` php artisan serve``` 

Truy cập ứng dụng: Mở trình duyệt web của bạn và truy cập địa chỉ sau: http://localhost:8000

Nếu báo chưa có key app thì chạy câu lệnh

``` php artisan key:generate``` 

Bạn đã hoàn thành! Bây giờ bạn có thể bắt đầu phát triển ứng dụng Laravel của mình. Hãy xem tài liệu chính thức của Laravel để tìm hiểu thêm về cách sử dụng và phát triển ứng dụng: https://laravel.com/docs

Chúc bạn thành công trong việc học Laravel và phát triển ứng dụng của mình!
