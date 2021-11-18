$(function() {
  // ゲーム時間のカウント
  $('#start').click(function() {
    // スタートを押したらボタンを消す
    $(this).css('display', 'none');
    // ゲーム時間
    var count = 0;
    // 問題文の配列
    var questions = [];
    // クリアした問題のIDの配列
    var gets = [];

    // 問題文取得
    $.ajax({
      type: "GET",
      url: "/ajax/question",
    })
    .done(function(data) {
      $.each(data, function(key,obj) {
        // 問題を取得して配列に入れる
        var list = [obj['id'], obj['jp_question'], obj['ro_question'], obj['on_image'], obj['type']];
        // 問題文の配列に入れる
        questions.push(list);
      });
      // ゲーム時間をカウント始める
      var timer = setInterval(function() {
        // 表示場所「木」
        var tree = document.getElementById('tree');
        // 表示場所「花」
        var flower = document.getElementById('flower');
        // 表示場所「草」
        var grass = document.getElementById('grass');
        // カウントが0最初の問題
        if(count == 0) {
          // 配列からランダムで問題取得
          var question = questions[Math.floor(Math.random() * questions.length)];
          // 虫の種類によって表示場所を木・花・草で変える
          if(question[4] == 1) {
              tree.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
          } else if (question[4] == 2) {
              grass.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
          } else if (question[4] == 3) {
              flower.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
          }
          // 成功した文字数
          var test = 0;
          // 失敗した文字数
          var miss = 0;
          // 捕まえた虫の数
          var success = 0;
          // 成功後残っている文字
          var checkList = question[2].substring(test);
          // 残っている文字数
          var check = checkList.length;

          // タイピング入力
          window.addEventListener("keydown", push);
          function push(event) {
            // 入力が成功した場合
            if(event.key == checkList.charAt(test)){
              test++;
              // 表示してる文字から成功した文字を消す
              if(question[4] == 1) {
                  tree.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
              } else if (question[4] == 2) {
                  grass.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
              } else if (question[4] == 3) {
                  flower.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
              }
              // 入力が失敗した場合
            } else {
              miss++;
            }
            // 問題文を全て打ち終えた場合
            if(check - test === 0) {
              // 成功を記録
              success++;
              gets.push(question[0]);
              // 前の問題文の内容をリセット
              $('#tree').empty();
              $('#grass').empty();
              $('#flower').empty();
              test = 0;
              // 新しい問題文を取得
              question = questions[Math.floor(Math.random() * questions.length)];
              checkList = question[2].substring(test);
              check = checkList.length;
              if(question[4] == 1) {
                  tree.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
              } else if (question[4] == 2) {
                  grass.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
              } else if (question[4] == 3) {
                  flower.innerHTML = '<p>' + question[1] + '</p>\n<p>' + question[2].substring(test) + '</p>\n<img src="../images/insects/' + question[3] + '" width="200px">';
              }
              console.log(gets);
            }
            // 60秒経過したら入力を受け付けない
            if(count >= 60) {
              return false;
            }
          };
        }
        count += 1;
        // 60秒で結果のモーダルを表示
        if(count >= 60) {
          clearInterval(timer);
          $('.result-modal').fadeIn();
        }
      }, 1000);
    });
  });
});