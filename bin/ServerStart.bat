set PHP_HOME=C:\sdk\php-5.6.17-Win32-VC11-x86\
set PATH=%PHP_HOME%;%PATH%
cd %~dp0..\WebContent
php -S 127.0.0.1:8888
pause