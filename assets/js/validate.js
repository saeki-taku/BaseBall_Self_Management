//jqueryの導入 修正！！！

$(function () {
  validation();
})

function validation() {

  $(".contact_submit").on('click', function() {

    let isEmpty = false;

    $(".name, .kana, .email, .body").each(function() {

      if ($(this).val() == "") {
        alert("必須項目が入力されていません");
        $(this).focus();
        isEmpty = true;
        return false;//伝播を止める
      }
    });
    if (isEmpty == true) {
      return false;
    }

    //氏名・フリガナ validation 10文字以内
    let errorWord = false;

    $(".name, .kana").each(function() {

      if($(this).val().length >= 10) {
        alert("10文字を超えています");
        $(this).focus();
        errorWord = true;
        return false;
      }
    });
    if(errorWord == true) {
      return false;
    }
    //電話番号 validation
    let tel = $("input.tel").val();
    let errorTell = false;

    if(!Number.isFinite(Number(tel))) {
      $(".tel").focus();
      errorTell = true;
      alert("電話番号は数字のみになります。");
    }
    if(errorTell) {
      return false;
    }
    //メールアドレス　validation
    let email = $("input.email").val();
    let errorMail = false;

    if(!email.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
      $(".email").focus();
      errorMail = true;
      alert("メールアドレスを入力してください。");
    }
    if(errorMail) {
      return false;
    }
  });
}
