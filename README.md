# Nginxキャッシュクリアプラグイン for baserCMS.

### Nginxキャッシュクリアプラグインの概要 ###
baserCMSのサーバキャッシュ削除とは別口で動作する、  
Nginx専用・キャッシュクリアプラグイン。  

### 使い方 ###
1. nginx.conf に記述してあるキャッシュディレクトリ名の絶対パスを控える。  
2. Nginxキャッシュディレクトリ更新管理にて新規データとして更新。  

※ Ver.1.6.5 からルートディレクトリ( /var/cache/ , /var/www/ )及び、baserCMSキャッシュディレクトリ( app/tmp/cache/ )をセキュリティ的な観点から固定化(セレクトボックスに)しましたので、キャッシュが保存されるフォルダ名のみを入力して下さい。尚、バリデーションにより「'/：スラッシュ' と '.：ドット'」は入力できません。  

※ Ver.1.7.0 から更新管理画面のディレクトリ選択項目を setting.php にて追加出来るようにしました。

その他、いろいろと参考にしながら組んだものなので、もし内容に間違いがあればコメント下さい。

### 免責事項 ###
当方でも実機によるテスト環境でデバッグを行っておりますが、  
万が一、**入力ミス等でディレクトリ内のファイルが消失した場合等の問題**が  
発生した際に**当方は一切の責任を負わないものとします。**  

それとは別に**技術的問題(脆弱性など)が発生した場合**は**速やかにご利用をお控えになり、**  
Githubのコメント欄にて**バグ報告を行って下さい。**  
**ご報告を下さった方へ**は、当方で**出来うる限りの方法**により**ご対応致します。**  

但し、**開発は無償で行っております**ので**金銭的な解決策は出来かねます**事を改めて申し上げます。  
そのような問題が発生しないとは言い切れませんが、**どうぞご容赦くださいますよう謹んでお願い申し上げます。**

尚、ご利用に際し **プログラムの仕様を充分にご理解・ご確認** の上、お使い下さい。  

以上の**免責事項に同意して下さった方のみ**ご利用下さい。

----

**免責事項策定：2015/02/12** / **免責事項改定：2015/02/22**　

----

### 更新履歴 ###
**Version 1.7.1** - 一時的に削除したシステムメニューを復旧。  
**Version 1.7.0** - setting.php / 更新管理・セレクトボックス・オプション項目を追加 / システムメニューの削除。  
**Version 1.6.8** - 管理画面のUI修正  
**Version 1.6.6** - 変数名の整理・一部のバグを修正  
**Version 1.6.5** - ルートディレクトリのみ固定化/選択制に変更。  
**Version 1.6.4** - 項目の文章変更・Nginxキャッシュ削除項目を管理画面に統合。  
**Version 1.6.3** - 編集画面でのタイトルが表示されてないバグの修正。  
**Version 1.6.2** - バリデーションの追加。  
**Version 1.6.1** - 初期データが作成されないバグを修正。  
**Version 1.6.0** - データベースに対応。  
**Version 1.5.0** - キャッシュ保存ディレクトリの変更画面追加。  
**Version 1.4.0** - 管理画面の追加。  
**Version 1.3.0** - nginx.conf 内のデフォルトディレクトリに対応。  
**Version 1.2.2** - ソース修正。  
**Version 1.2.1** - コメント欄の間違い修正。  
**Version 1.2.0** - setting.phpの追加。  
**Version 1.1.1** - バグ修正。  
**Version 1.1.0** - 公開。  

### ライセンス ###
baserCMS と同じ MIT lincense
