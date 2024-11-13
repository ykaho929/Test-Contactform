#Test_Contactform
## 環境構築
Dockerビルド  
 1. git@github.com:ykaho929/Test-Contactform.git
 2. docker-compose up -d -build  

Laravel環境構築  
 1.　docker-compose exec php bush  
 2.　composer install  
 3.　env.exampleファイルから.envを作成し、環境変数を変更  
 4.　php artisan key:generate  
 5.　php artisan migrate  
 6.　php artisan db:seed  
 
## 使用技術（実行環境）  
　・PHP　8.3.8  
　・Laravel　8.83.8  
　・MySQL　8.0.39  
## ER図
 　![Test-Contactform_ER図](https://github.com/user-attachments/assets/861a0782-a3fb-4297-b6bc-a7da42c0a2b8)

## URL  
　・開発環境：http://localhost  
　・phpMyAdmin:http://localhost:8080/
