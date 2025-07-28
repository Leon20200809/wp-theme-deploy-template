# WordPress Theme Auto-Deploy Template

これは GitHub Actions を使って WordPress のオリジナルテーマを自動デプロイするテンプレートです。

## 🔧 目的

- WordPressテーマの更新を自動化
- SSH経由でサーバーに反映
- ローカル → GitHub → サーバー のCI/CD構成

## 📦 内容

- 最小構成の `style.css`, `functions.php`
- `.github/workflows/deploy.yml` で自動化
- Xserverなどの共有サーバーでも運用可能

## ⚠️ 注意

このリポジトリは**自動化学習用のダミー構成**です。  
秘密鍵や実際のサーバー情報は含まれていません。
