@echo off
schtasks /Create /TN "cron1" /TR "C:\xampp\php\php.exe C:\xampp\htdocs\Software-Technology\app\Cron\cron1.php" /SC MINUTE /MO 1
pause